<?php

namespace App\Services;

use JetBrains\PhpStorm\NoReturn;
use PDO;
class Auth
{
    private PDO $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login($nickname, $password): array
    {
        if (!$nickname || !$password) {
            return ['error' => 'Помилка отримання ніку та паролю'];
        }

        $sql = "SELECT * FROM crazyblog.users WHERE nickname = :nickname";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return [
                    'user_id' => $user['id'],
                    'nickname' => $user['nickname'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'avatar' => $user['avatar'],
                    'status' => $user['status'],
                    'logged' => true
                ];
            } else {
                return ['error' => 'Невірний пароль'];
            }
        } else {
            return ['error' => 'Користувача з таким нікнеймом не знайдено'];
        }
    }

    public function register(array $data): array
    {
        if (isset($data['password']) && isset($data['password_confirm'])) {
            if ($data['password'] === $data['password_confirm']) {
                $nickname = $data['nickname'];
                $username = $data['username'];
                $email = $data['email'];
                $avatar = '/assets/images/User.png';
                $password = password_hash($data['password'], PASSWORD_DEFAULT);
                $status = 1;

                $sql = "INSERT INTO crazyblog.users (nickname, username, avatar, email, password, status) 
                        VALUES (:nickname, :username, :avatar, :email, :password, :status)";
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':nickname', $nickname);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':avatar', $avatar);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':status', $status);

                if ($stmt->execute()) {
                    return [
                        'success' => 'Ви успішно зареєструвались!',
                        'redirect' => '/login'
                    ];
                } else {
                    return [
                        'error' => 'Помилка при реєстрації',
                        'redirect' => '/registration'
                    ];
                }
            } else {
                return [
                    'error' => 'Паролі не співпадають',
                    'redirect' => '/registration'
                ];
            }
        } else {
            return [
                'error' => 'Помилка отримання даних POST',
                'redirect' => '/registration'
            ];
        }
    }

    public function isLoggedIn(): bool
    {
        session_start();
        return isset($_SESSION['logged']);
    }

    public function redirectIfNotLoggedIn(): void
    {
        if (!$this->isLoggedIn()) {
            header('Location: /login');
            exit();
        }
    }

    public function redirectIfLoggedIn(): void
    {
        if ($this->isLoggedIn()) {
            header('Location: /');
            exit();
        }
    }

    #[NoReturn] public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();

        if (!empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: /");
        }
        exit();
    }

}
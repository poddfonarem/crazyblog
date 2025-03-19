<?php

namespace App\Services;

use PDO;

class Profile
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function updateProfile(int $userId, string $newUsername, string $newNickname, string $newEmail, array $avatarFile = null): array
    {
        $newAvatar = $this->handleAvatarUpload($avatarFile);

        $sql = "UPDATE crazyblog.users SET nickname = :nickname, username = :username, email = :email, avatar = :avatar WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':nickname', $newNickname);
        $stmt->bindParam(':username', $newUsername);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':avatar', $newAvatar);
        $stmt->bindParam(':id', $userId);

        if ($stmt->execute()) {
            $_SESSION['nickname'] = $newNickname;
            $_SESSION['username'] = $newUsername;
            $_SESSION['email'] = $newEmail;
            $_SESSION['avatar'] = $newAvatar;
            return ['success' => 'Дані успішно оновлено!'];
        } else {
            return ['error' => 'Помилка при оновленні даних!'];
        }
    }

    private function handleAvatarUpload(?array $avatarFile = null): string
    {
        if ($avatarFile['error'] == 0) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $avatarPath = $uploadDir . time() . basename($avatarFile['name']);

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (file_exists($avatarPath)) {
                $_SESSION['error'] = "Файл з таким ім'ям вже існує!";
                return 'assets/images/User.png';
            } else {
                if (move_uploaded_file($avatarFile['tmp_name'], $avatarPath)) {
                    $_SESSION['success'] = "Аватар успішно завантажено!";
                    return str_replace($_SERVER['DOCUMENT_ROOT'] . "/", "/", $avatarPath);
                } else {
                    $_SESSION['error'] = "Помилка при завантаженні файлу.";
                    return 'assets/images/User.png';
                }
            }
        } else {
            $_SESSION['error'] = "Помилка завантаження файлу: " . $avatarFile['error'];
            return 'assets/images/User.png';
        }
    }

    public function requestPasswordReset(string $email): array
    {
        $sql = "SELECT id, email FROM crazyblog.users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            try {
                $token = bin2hex(random_bytes(16));
            } catch (\Exception $e) {
                return ['error' => 'Не вдалося згенерувати токен для скидання пароля.'];
            }

            $expiry = time() + 3600;

            $updateStmt = $this->conn->prepare("UPDATE crazyblog.users SET reset_token = :token, token_expiry = :expiry WHERE email = :email");
            $updateStmt->bindValue(':token', $token, PDO::PARAM_STR);
            $updateStmt->bindValue(':expiry', $expiry, PDO::PARAM_INT);
            $updateStmt->bindValue(':email', $email, PDO::PARAM_STR);
            $updateStmt->execute();

            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'];
            $currentUrl = $protocol . '://' . $host;

            $resetLink = $currentUrl . "/submitNewPassword/" . $token;

            $subject = "Скидання пароля";
            $message = "Вітаємо! Щоб скинути пароль, перейдіть за наступним посиланням: " . $resetLink;
            $headers = "From: no-reply@crazyblog.com";

            if (mail($email, $subject, $message, $headers)) {
                return ['success' => 'Інструкції для скидання пароля надіслано на вашу електронну пошту.'];
            } else {
                return ['error' => 'Сталася помилка при відправці листа.'];
            }
        } else {
            return ['error' => 'Користувача з такою електронною поштою не знайдено.'];
        }
    }

    public function updatePassword(string $token, string $newPassword): array
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        try {
            $sql = "UPDATE crazyblog.users SET password = :password, reset_token = NULL, token_expiry = NULL WHERE reset_token = :token";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            return ['success' => "Ваш пароль успішно оновлено."];
        } catch (\PDOException $e) {
            return ['error' => "Помилка бази даних: " . $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

}
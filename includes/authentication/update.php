<?php
require_once '../function/func.php';
global $conn;

if (isset($_SESSION['user_id'])) {

    $userId = $_SESSION['user_id'];
    $newUsername = $_POST['username'];
    $newNickname = $_POST['nickname'];
    $newEmail = $_POST['email'];

    if (!empty($_FILES['avatar']['name'])) {
        if ($_FILES['avatar']['error'] == 0) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $avatarPath = $uploadDir . time() . basename($_FILES['avatar']['name']);

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (file_exists($avatarPath)) {
                $_SESSION['error'] = "Файл з таким ім'ям вже існує!";
            } else {
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath)) {
                    $newAvatar = str_replace($_SERVER['DOCUMENT_ROOT'] . "/", "/", $avatarPath);
                    $_SESSION['success'] = "Аватар успішно завантажено!";
                } else {
                    $_SESSION['error'] = "Помилка при завантаженні файлу.";
                }
            }
        } else {
            $_SESSION['error'] = "Помилка завантаження файлу: " . $_FILES['avatar']['error'];
        }
    } else {
        $newAvatar = 'assets/images/User.png';
    }

    $sql = "UPDATE crazyblog.users SET nickname = :nickname, username = :username, email = :email, avatar = :avatar WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nickname', $newNickname);
    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':email', $newEmail);
    $stmt->bindParam(':avatar', $newAvatar);
    $stmt->bindParam(':id', $userId);

    header('Location: /profile');
    if ($stmt->execute()) {
        $_SESSION['nickname'] = $newNickname;
        $_SESSION['username'] = $newUsername;
        $_SESSION['email'] = $newEmail;
        $_SESSION['avatar'] = $newAvatar;
        $_SESSION['success'] = 'Дані успішно оновлено!';
    } else {
        die($_SESSION['error'] = 'Помилка при оновленні даних!');
    }
} else {
    header('Location: /profile');
    die($_SESSION['error'] = 'Користувач не авторизований!');
}
<?php
session_start();
require_once __DIR__ . '/../database/connect.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token'])) {
    echo  $token = $_POST['token'];
 echo   $newPassword = $_POST['newPassword'];

echo    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    try {
        if ($conn === null) {
            throw new Exception("Ошибка подключения к базе данных.");
        }

        $sql = "UPDATE crazyblog.users SET password = :password, reset_token = NULL, token_expiry = NULL WHERE reset_token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['success'] = "Ваш пароль успішно оновлено.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Помилка бази даних: " . $e->getMessage();
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    } finally {
        $conn = null;
    }
}

header("Location: /login");
exit;

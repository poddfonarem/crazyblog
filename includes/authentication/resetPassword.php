<?php
require_once '../function/func.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $sql = "SELECT id, email FROM crazyblog.users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()  > 0) {
        try {
            $token = bin2hex(random_bytes(16));
        } catch (\Random\RandomException $e) {

        }
        $expiry = time() + 3600;

        $updateStmt = $conn->prepare("UPDATE crazyblog.users SET reset_token = :token, token_expiry = :expiry WHERE email = :email");
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

        header("Location: ".$_SERVER['HTTP_REFERER']);
        if (mail($email, $subject, $message, $headers)) {
            $_SESSION['success'] = "Інструкції для скидання пароля надіслано на вашу електронну пошту.";
        } else {
            $_SESSION['error'] = "Сталася помилка при відправці листа.";
        }
    } else {
        header("Location: ".$_SERVER['HTTP_REFERER']);
        $_SESSION['error'] = "Користувача з такою електронною поштою не знайдено.";
    }
}

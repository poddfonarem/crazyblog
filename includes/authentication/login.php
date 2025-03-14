<?php
require_once '../function/func.php';
global $conn;

if (isset($_POST)) {
    if ($_POST['nickname'] && $_POST['password']) {
        $nickname = $_POST['nickname'];
        $inputPassword = $_POST['password'];

        $sql = "SELECT * FROM crazyblog.users WHERE nickname = :nickname";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($inputPassword, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['avatar'] = $user['avatar'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['logged'] = true;
                header('Location: /');
            } else {
                header('Location: /login');
                die($_SESSION['error'] = 'Невірний пароль');
            }
        } else {
            header('Location: /login');
            die($_SESSION['error'] = 'Користувача з таким нікнеймом не знайдено');
        }
    } else {
        header('Location: /login');
        die($_SESSION['error'] = 'Помилка отримання ніку та паролю');
    }
} else {
    header('Location: /login');
    die($_SESSION['error'] = 'Помилка отримання POST');
}
<?php
require_once __DIR__ . "/../function/func.php";
global $conn, $auth;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nickname']) && isset($_POST['password'])) {
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];

        $result = $auth->login($nickname, $password);

        if (isset($result['logged']) && $result['logged'] === true) {
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['nickname'] = $result['nickname'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['avatar'] = $result['avatar'];
            $_SESSION['status'] = $result['status'];
            $_SESSION['logged'] = true;

            header('Location: /');
        } else {
            $_SESSION['error'] = $result['error'];
            header('Location: /login');
        }
    } else {
        $_SESSION['error'] = 'Помилка отримання ніку та паролю';
        header('Location: /login');
    }
} else {
    $_SESSION['error'] = 'Помилка отримання POST';
    header('Location: /login');
}
exit;
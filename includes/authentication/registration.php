<?php
require_once '../function/func.php';
global $conn;

if(isset($_POST)){
    if($_POST['password'] === $_POST['password_confirm']){
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $avatar = '/assets/images/User.png';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $status = 1;

        $sql = "INSERT INTO users (nickname, username, avatar, email, password, status) 
                VALUES (:nickname, :username, :avatar, :email, :password, :status)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':status', $status);

        if ($stmt->execute()) {
            header('Location: /login');
            die($_SESSION['success'] = 'Ви успішно зареєструвались!');
        } else {
            header('Location: /registration');
            die($_SESSION['error'] = 'Помилка при реєстрації');
        }
    }else{
        header('Location: /registration');
        die($_SESSION['error'] = 'Паролі не співпадають');
    }
}else{
    header('Location: /registration');
    die($_SESSION['error'] = 'Помилка отримання даних POST');
}

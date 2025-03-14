<?php
require_once __DIR__ . '/../function/func.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['titlePost'];
    $text = $_POST['textPost'];
    $userId = $_SESSION['user_id'];

    try {
        $stmt = $conn->prepare("INSERT INTO crazyblog.posts (title, text, userId) VALUES (:title, :text, :userId)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $_SESSION['success'] = "Пост успішно додано!";
        header("Location: /profile");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Помилка: " . $e->getMessage();
    }
}

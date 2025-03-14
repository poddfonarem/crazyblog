<?php
require '../function/func.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id'])) {
    $commentId = (int)$_POST['comment_id'];

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "Ви не авторизовані!";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM crazyblog.comments WHERE id = :comment_id AND userId = :user_id");
    $stmt->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Коментар успішно видалено!";
    } else {
        $_SESSION['error'] = "Помилка при видаленні коментаря.";
    }
}

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();

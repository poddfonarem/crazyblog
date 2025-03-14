<?php
require_once '../function/func.php';
global $conn;

if(isset($_POST['post_comment'])){

    $comment = $_POST['post_comment'];
    $userId = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    $sql = "INSERT INTO crazyblog.comments (userId, comment, postId) 
                VALUES (:userId, :comment, :postId)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':postId', $post_id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die($_SESSION['success'] = 'Коментар успішно додано');
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die($_SESSION['error'] = 'Помилка при додаванні коментарю');
    }
}
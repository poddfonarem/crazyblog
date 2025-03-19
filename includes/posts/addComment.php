<?php
require_once '../function/func.php';

use App\Services\Comment;

global $conn;
$commentService = new Comment($conn);

if (isset($_POST['post_comment'])) {
    $comment = $_POST['post_comment'];
    $userId = $_SESSION['user_id'];
    $postId = $_POST['post_id'];

    $result = $commentService->addComment($userId, $comment, $postId);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
    } else {
        $_SESSION['error'] = $result['error'];
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
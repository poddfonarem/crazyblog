<?php
require '../function/func.php';

use App\Services\Comment;

global $conn;
$commentService = new Comment($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id'])) {
    $commentId = (int)$_POST['comment_id'];

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "Ви не авторизовані!";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $result = $commentService->deleteComment($commentId, $_SESSION['user_id']);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
    } else {
        $_SESSION['error'] = $result['error'];
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

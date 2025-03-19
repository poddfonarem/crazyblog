<?php
require_once __DIR__ . '/../function/func.php';

use App\Services\Post;

global $conn;
$post = new Post($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['titlePost'];
    $text = $_POST['textPost'];
    $userId = $_SESSION['user_id'];

    $result = $post->addPost($title, $text, $userId);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
        header("Location: /profile");
        exit();
    } else {
        $_SESSION['error'] = $result['error'];
    }
}
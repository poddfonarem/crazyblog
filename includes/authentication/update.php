<?php
require_once '../function/func.php';

use App\Services\Profile;

global $conn;
$profile = new Profile($conn);

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $newUsername = $_POST['username'];
    $newNickname = $_POST['nickname'];
    $newEmail = $_POST['email'];

    $result = $profile->updateProfile($userId, $newUsername, $newNickname, $newEmail, $_FILES['avatar'] ?? null);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
    } else {
        $_SESSION['error'] = $result['error'];
    }

    header('Location: /profile');
} else {
    header('Location: /login');
    $_SESSION['error'] = 'Користувач не авторизований!';
}
exit();
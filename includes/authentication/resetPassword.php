<?php
require_once '../function/func.php';
global $conn;

use App\Services\Profile;

$profile = new Profile($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $result = $profile->requestPasswordReset($email);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
    } else {
        $_SESSION['error'] = $result['error'];
    }

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
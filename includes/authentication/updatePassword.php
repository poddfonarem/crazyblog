<?php
require_once __DIR__ . "/../function/func.php";

use App\Services\Profile;

global $conn;
$profile = new Profile($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token'], $_POST['newPassword'])) {
    $token = $_POST['token'];
    $newPassword = $_POST['newPassword'];

    $result = $profile->updatePassword($token, $newPassword);

    if (isset($result['success'])) {
        $_SESSION['success'] = $result['success'];
    } else {
        $_SESSION['error'] = $result['error'];
    }

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

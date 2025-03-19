<?php
require_once '../function/func.php';
global $conn;

use App\Services\Auth;

$auth = new Auth($conn);

$result = $auth->register($_POST);

header('Location: ' . $result['redirect']);
if (isset($result['success'])) {
    $_SESSION['success'] = $result['success'];
} else {
    $_SESSION['error'] = $result['error'];
}
exit();
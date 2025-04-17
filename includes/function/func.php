<?php
header("X-Content-Type-Options: nosniff; Content-Security-Policy: frame-ancestors 'none'; 
Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");

session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
]);
session_start();

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Services\Auth;
use App\Services\Database;

$database = new Database();
$conn = $database->getConnection();

$auth = new Auth($conn);



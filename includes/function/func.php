<?php
session_start();

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Services\Auth;
use App\Services\Database;

$database = new Database();
$conn = $database->getConnection();

$auth = new Auth($conn);



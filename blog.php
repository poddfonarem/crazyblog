<?php
session_start();
require_once "includes/database/connect.php";
require_once 'includes/audit/isLogin.php';

$formPanel = $_GET['state'] ?? '';
if ($formPanel === 'page') {$pageName = 'Блог';}
else {$pageName = 'Блоги';}

require_once 'includes/build/html.php';
require_once 'includes/build/header.php';

if($formPanel === 'page') {
    require_once 'includes/components/blog/blogPage.php';
}else{
    require_once 'includes/components/blog/blogList.php';
}

require_once 'includes/build/footer.php';

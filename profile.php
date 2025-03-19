<?php
require_once 'includes/function/func.php';
global $auth;
$auth->redirectIfNotLoggedIn();
$pageName = $_SESSION['nickname'];
require_once 'includes/build/html.php';
require_once 'includes/build/header.php';
require_once 'includes/components/profile/profile.php';
require_once 'includes/components/profile/settings.php';
require_once 'includes/components/profile/addPost.php';
require_once 'includes/components/profile/posts.php';
require_once 'includes/build/footer.php';


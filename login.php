<?php
require_once 'includes/audit/isNotLogin.php';
$formPanel = $_GET['page'] ?? '';
if ($formPanel === 'authentication') {$pageName = 'Вхід';}
else if ($formPanel === 'registration') {$pageName = 'Реєстрація';}
else if ($formPanel === 'resetPassword') {$pageName = 'Скидання пароля';}
else if ($formPanel === 'submitNewPassword') {$pageName = 'Створення нового пароля';}

require_once 'includes/build/html.php';

if($formPanel === 'authentication') {
    require_once 'includes/components/authentication/login.php';
}else if($formPanel === 'registration'){
    require_once 'includes/components/authentication/registration.php';
}else if($formPanel === 'resetPassword'){
    require_once 'includes/components/authentication/resetPassword.php';
}else if($formPanel === 'submitNewPassword'){
    require_once 'includes/components/authentication/submitNewPassword.php';
}else{
    header('Location:/login');
}
require_once 'includes/build/footer.php';
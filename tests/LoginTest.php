<?php
require '../vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\LoginPage;
use Pages\HomePage;

$host = 'http://localhost:4444/wd/hub'; // Selenium Server
$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

$loginPage = new LoginPage($driver);
$dashboardPage = new HomePage($driver);

$loginPage->open();
$loginPage->login('joker', '123456789');
try {
    $dashboardPage->verifyWelcomeMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$driver->quit();
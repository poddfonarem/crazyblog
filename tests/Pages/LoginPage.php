<?php
namespace Pages;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class LoginPage
{
    protected RemoteWebDriver $driver;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function open(): void
    {
        $this->driver->get('http://crazyblog/login.php');
    }

    public function login($username, $password): void
    {
        $this->driver->findElement(WebDriverBy::id('username'))->sendKeys($username);
        $this->driver->findElement(WebDriverBy::id('password'))->sendKeys($password);
        $this->driver->takeScreenshot('step1_login_filled.png');

        $this->driver->findElement(WebDriverBy::id('loginButton'))->click();
        $this->driver->takeScreenshot('step2_after_click.png');
    }
}

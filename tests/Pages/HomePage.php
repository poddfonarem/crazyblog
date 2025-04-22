<?php
namespace Pages;

use Exception;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class HomePage
{
    protected RemoteWebDriver $driver;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @throws Exception
     */
    public function verifyWelcomeMessage(): void
    {
        $cabinetBtn = $this->driver->findElement(WebDriverBy::id('cabinet-btn'))->getText();
        if (!str_contains($cabinetBtn, 'Кабінет')) {
            throw new Exception("Ви не авторизовані!");
        }
        $this->driver->takeScreenshot('step3_homepage.png');
    }
}

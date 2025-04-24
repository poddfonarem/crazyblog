<?php

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext implements Context
{
    /**
     * @Given I am a registered user
     */
    public function iAmARegisteredUser()
    {
        $this->visit('/register');
        $this->fillField('username', 'joker');
        $this->fillField('email', 'joker@gmail.com');
        $this->fillField('password', '123456789');
        $this->pressButton('Register');
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->visit('/login');
        $this->fillField('nickname', 'joker');
        $this->fillField('password', '123456789');
        $this->pressButton('Login');
    }

    /**
     * @Given a post titled :title exists
     */
    public function aPostTitledExists($title)
    {
        $this->iAmLoggedIn();
        $this->visit('/profile');
        $this->fillField('title', $title);
        $this->fillField('content', 'Content for ' . $title);
        $this->pressButton('Create Post');
    }

    /**
     * @Given I am on the post page
     */
    public function iAmOnThePostPage()
    {
        $this->visit('/blog/1');
    }
}

<?php

use Tests\Support\AcceptanceTester;

$I = new AcceptanceTester($scenario);
$I->amOnPage('http://crazyblog/login');

$I->fillField('#floatingInput', 'joker');

$I->fillField('#floatingPassword', '123456789');

$I->click('#submitButton');

$I->seeInTitle('Головна - CrazyBlog');

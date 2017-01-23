<?php

$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Login into LAZ');

$I->amOnPage('/login');
$I->fillField('email', 'email@email.com');
$I->fillField('password', 'password');
$I->click('Login');
$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
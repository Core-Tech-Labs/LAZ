<?php

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('Register as a New User on LAZ');

$I->amOnPage('/register');
$I->seeCurrentUrlEquals('/register');

$I->fillField('_dob', '01/01/1990');
$I->fillField('zip', '11226');
$I->fillField('username', 'JonDoe');
$I->fillField('email', 'email@email.com');
$I->fillField('password', 'demoLog');
$I->fillField('password_confirmation', 'demoLog');
$I->click('Register');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();
$I->amOnPage('/home');
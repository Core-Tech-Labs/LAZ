<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Edit Profile Settings');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click(['link'=>'Settings']);

$I->fillField('email', 'poss@email.com');
$I->fillField('username', 'JoeDoe');
$I->fillField('password', 'password1');
$I->fillField('password_confirmation', 'password1');
$I->fillField('password_old', 'password');
$I->click('Save');

$I->see('You have updated your profile Successfully!');



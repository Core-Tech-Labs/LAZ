<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Sending Another user a message');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click('master');
$I->click('#msg');
$I->submitForm('#prevent', [
      'UserConsumers' => 'master',
      'message-body' => 'Hey There',
], 'Post');
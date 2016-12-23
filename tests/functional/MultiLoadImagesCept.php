<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Upload Images to Profile');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click(['link'=>'user']);

$I->click('#userImage');
$I->submitForm('#massUpload', [
    'dp'=>'test.jpg'
]);

$I->click('.btn-success');

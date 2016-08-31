<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Upload Images to Profile');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click(['link'=>'RudyJ']);

$I->click('#userImage');
$I->submitForm('#massUpload', [
    'dp'=>'test.jpg'
]);

$I->click('Save Changes');

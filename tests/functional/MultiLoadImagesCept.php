<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Upload Images to Profile');

$I->amLoggedAs(['email'=>'master@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click(['link'=>'master']);

$I->click('#userImage');

// $I->sendAjaxRequest('POST','/images/master/upload', ['file'=>'test.jpg']);

// $I->submitForm('#massUpload',[
//     'file'=>'test.jpg',
// ]);

$I->click('.btn-success');


// Testing Updating Default profile picture
$I->wantTo('Update Default Profile picture');
$I->amOnPage('/_user');
$I->click('.profile-photo');

// $I->submitForm('#profileUpload', [
//   'dp'=>'test.jpg'
// ]);

$I->click('.btn-success');

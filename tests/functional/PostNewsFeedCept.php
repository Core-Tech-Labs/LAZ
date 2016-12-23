<?php

$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Post a new News Post on my timeline');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->submitForm('#prevent', [
      'UserPosting' => 'user',
      'UserPostingID' => '1',
      'BaseComment' => 'We love big baconator from wendys',
], 'Post');

$I->see('Posted Successfully');
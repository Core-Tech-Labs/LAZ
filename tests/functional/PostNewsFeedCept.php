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

// Testing Deleting NewFeedPost
$I->wantTo('Delete a post on my home page');

$I->amOnPage('/home');
$I->click('.dropdown-toggle');
$I->click('ul.dropdown-menu');
$I->click('.btn-danger');
$I->see('Deleted Post Successfully');
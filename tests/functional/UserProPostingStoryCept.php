<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Post a new News Post on my profile');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click('master');

$I->amOnPage('/_master');
$I->submitForm('#prevent', [
      'UserPosting' => 'user',
      'UserPostingID' => '1',
      'BaseComment' => 'We love big baconator from wendys',
], 'Post');

$I->see('Posted Successfully');


// Testing Deleting NewFeedPost
// This feature would need extensive work
// $I->wantTo('Delete a post on my profile page');

// $I->amOnPage('/_user');
// $I->click('.dropdown-toggle');
// $I->click('ul.dropdown-menu');
// $I->click('.btn-danger');
// $I->see('Deleted Post Successfully');


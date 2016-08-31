<?php
$I = new FunctionalTester($scenario);
$I->am('Registered LAZ User');
$I->wantTo('Favorite a new User');

$I->amLoggedAs(['email'=>'email@email.com', 'password'=>'password']);
$I->seeAuthentication();

$I->amOnPage('/home');
$I->click('dolores3');
$I->click('Add Fav');
$I->see('You are now following');

// UnFav A User
$I->see('Favorited');
$I->click('Favorited');
$I->see('You have unfollowed dolores3');
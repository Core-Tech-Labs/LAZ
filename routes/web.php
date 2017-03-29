<?php


//Dashboard
Route::get('home',['as'=>'home.dashboard','uses'=>'UserController@home']);


//$auth Users = users who are logged in
Route::resource('user', 'UserController',
                ['except' => ['create', 'edit', 'index', 'store', 'show']]);
Route::get('_{user}', ['as'=> 'user.profile', 'uses' => 'UserController@index']);



// News Feed resource
Route::resource('feed', 'FeedsController',['only'=>['store','destroy']]);

// Images
Route::post('images/{user}/upload', ['as'=>'user.images', 'uses'=>'UserController@upload']);
Route::post('images/dpUpload/{user}', 'UserController@dp');

// Settings
Route::resource('settings', 'SettingsController',
                ['only' => ['edit', 'update']]);

// Favs
Route::resource('favs', 'FavController',
                ['except'=>['update','edit','show','create']]);


// Messages
Route::get('message/{user}', ['as'=> 'message.index', 'uses' => 'MessageController@index']);
Route::resource('message','MessageController',
                ['except'=>['index','edit', 'create']]);
Route::post('message/{user}', ['as'=>'message.send' ,'uses'=>'MessageController@send']);
Route::get('messageSearch', ['as'=>'message.search', 'uses'=>'MessageController@search']);


// Activity
// Ned to make into Route::get('activity/{user}','ActivityController@show' );
Route::resource('activity', 'ActivityController');
Route::post('/marknotify', 'ActivityController@markBellAsRead');

// For Guest Users
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'WelcomeController@index');

Route::auth();
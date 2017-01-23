<?php

namespace App\Providers;

use Route;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

    Route::bind('user', function($value){
        return \App\User::where('username', $value)->first();
    });

    Route::bind('settings', function($value){
        return \App\User::where('username', $value)->first();
    });

    Route::bind('activity', function($value){
        return \App\User::where('username', $value)->first();
    });

    Route::bind('message', function($value){
        return \App\User::where('username', $value)->first();
    });

    Route::bind('feed', function($value){
        return \App\User::where('username', $value)->first();
    });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}

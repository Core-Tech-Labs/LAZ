<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
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
	public function map()
	{
    $this->mapWebRoutes();
    // $this->mapApiRoutes();

	}

  /**
   * Define Web routes
   * @return void
   */
  protected function mapWebRoutes(){
      Route::group([
            'middleware' => 'auth',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
  }

  /**
   * Define Api routes
   * @return void
   */
  protected function mapApiRoutes(){
      Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
  }



}

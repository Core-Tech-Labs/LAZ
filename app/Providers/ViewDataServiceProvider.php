<?php
namespace App\Providers;


use Illuminate\Support\ServiceProvider;



class ViewDataServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

		  $this->compserSettingsLink();
      $this->composeUsernameSettings();
	}

  /**
	 * Register the application services.
   *
   * @return void
   */
	public function register()
	{
      //
	}

  /**
   *  Setting View Partails for head.blade.php
   *
   */
  public function compserSettingsLink(){

      view()->composer('head', function($view){
              $view->with('UserData', \Auth::User() );
      });
  }

  /**
   *  Setting View Partails for settings.blade.php
   *
   */
  public function composeUsernameSettings(){

      view()->composer('user.settings', function($view){
              $view->with('UserData', \Auth::User() );
      });
  }

}

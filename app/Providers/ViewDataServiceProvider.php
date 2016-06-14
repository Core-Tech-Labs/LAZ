<?php
namespace App\Providers;

use App\Online;
use App\UsersPhotos;
use Illuminate\Support\ServiceProvider;
use Redis;



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
      $this->composeOnlineSession();
      $this->composeDashboardOnlineSession();
      $this->composeUserPhotos();
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

  /**
   * View Partils for showing online users icon on Users Profile
   * @return [array] [Returning all active Users within an array]
   */
  public function composeOnlineSession(){
    view()->composer('user.user', function($view){
              $view->with('online', Online::registered()->lists('user_id')->toArray());
    });
  }

  /**
   * View Partils for showing Online Users on Home page
   * @return [colection] [Returning all active Users exculding auth user]
   */
  public function composeDashboardOnlineSession(){
    view()->composer('user.home', function($view){
              $view->with('online', Online::registered()->where('user_id', '!=', \Auth::id())->get() );
    });
  }

  /**
   * [composeUserPhotos description]
   * @return [type] [description]
   */
  public function composeUserPhotos(){
    view()->composer('user.user', function($view){
              $view->with('photos', UsersPhotos::images()->get() );
    });
  }

}

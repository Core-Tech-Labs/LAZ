<?php namespace App\Providers;

use App\userData;
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
        
        
        public function compserSettingsLink(){
            
            view()->composer('head', function($view){
                    $view->with('aboutMeData', userData::find(1)); 
                    //Seriously need to improve from find(1) No arguements should be n there
            });
        }
}

<?php namespace App\Http\Controllers;

use App\userData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller {
    
        /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

//	  public function show(User $username, userData $UserData){
//            return redirect()->action('SettingsController@edit');
//        }

        /**
         * Shows Settings page
         * updates userData on User Profile(s) Settings Page
         * Need to pass $UserData object as $aboutMeData For Route && Form Model Binding
         * 
         * @param $UserData
         * @return view && $username 
         */
         public function edit(userData $UserData){
             $aboutMeData = $UserData;
             return view('user.settings', compact('aboutMeData'));
        } 
        
        
        /**
         * Control User editing their Settings Page
         * Need to pass $UserData object as $aboutMeData For Route && Form Model Binding
         * 
         * @param type $UserData
         * @param Request $request
         * @return type
         */
        public function update(userData $UserData, Request $request){
            $aboutMeData = $UserData;
            $aboutMeData->update($request->all());
            
            session()->flash('success_message', 'You have updated your profile Successfully!');
            return redirect('user');
        }
}

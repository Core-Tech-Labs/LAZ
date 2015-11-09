<?php
namespace App\Http\Controllers;

use App\User;
use App\userData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserDataRequest;

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

             return view('user.settings', compact('UserData'));
        }

        /**
         * Function to update Users Email, Username, Password
         * (Some work still needs to be done on the Authentication)
         *
         * @param UpdateUserDataRequest $request
         * @return view
         */
        public function update(UpdateUserDataRequest $request, User $UserData){

            if(\Hash::check($request->input('password_old'), $UserData->password))
                {
                $UserData->update([
                    'password' => bcrypt( $request->input('password') ),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                ]);

                session()->flash('success_message', 'You have updated your profile Successfully!');

                return redirect('user.settings');
            }
            return redirect('user.settings')->with('message', 'Please Check your info')->withErrors($request);


        }
}

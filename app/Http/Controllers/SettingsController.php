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

    /**
     * Shows Settings page
     * updates userData on User Profile(s) Settings Page
     * Need to pass $UserData object as $aboutMeData For Route && Form Model Binding
     *
     * @param $UserData
     * @return view && $username
     */
     public function edit(userData $UserData){

         return view('user.settings');
    }

    /**
     * Function to update Users Email, Username, Password
     *
     * @param UpdateUserDataRequest $request
     * @return view
     */
    public function update($username, UpdateUserDataRequest $request, User $UserData){

        $oldPass = $UserData->where('username', $username)->first();

        if(\Hash::check($request->input('password_old'), $oldPass->password) )
            {
            $UserData->update([
                'password' => bcrypt( $request->input('password') ),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
            ]);

            session()->flash('success_message', 'You have updated your profile Successfully!');
            return back();
            }

        session()->flash('failure_message', 'The Password you entered is not what we have on record');
        return back()->withInput();


    }


}

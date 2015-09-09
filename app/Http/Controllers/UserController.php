<?php namespace App\Http\Controllers;

use App\User;
use App\userData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserDataRequest;

class UserController extends Controller {

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
        public function home(){
            return view('user.home');
        }

        /**
         * function to show Current logged in user profile all data from source
         * @return type
         */
	public function index(User $UserData)
	{
                $UserData['age'] = User::getAge();
                $UserData['zip'] = userData::getUserZip();
		return view('user.user', $UserData);
	}

        /**
         * Show Other User Profiles
         * @param type $username
         * @return type
         */
        public function show(User $UserData){
            dd($username);
            return $username;
//           return view('user.user', compact('username'));
        }

        /**
         * Function to update Users Email, Username, Password
         * (Some work still needs to be done on the Authentication)
         *
         * @param UpdateUserDataRequest $request
         * @return type
         */
        public function update(UpdateUserDataRequest $request){

            $user = User::all();

            if(Hash::check('password', $user->password))/*Work to be done*/
                {
                $user->update([
                    'password' => bcrypt('password_new'),
                    'email' => 'email',
                    'username' => 'username',
                ]);
                $user->save;

                session()->flash('success_message', 'You have updated your profile Successfully!');

                return redirect('user.settings');
            }
            return redirect('user.settings')->with('message', 'Please Check your info')->withErrors($request);
        }



}
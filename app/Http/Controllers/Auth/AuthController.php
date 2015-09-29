<?php namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
use App\User;
use Validator;
use App\userData;
=======
use Validator;
>>>>>>> origin/master
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except'  => 'getLogout']);
	}

<<<<<<< HEAD

=======
>>>>>>> origin/master
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
<<<<<<< HEAD
	public function validator(array $data)
	{
=======
	protected function validator(){
>>>>>>> origin/master
		return Validator::make($data, [
			'username' => 'required|max:15|min:4|unique:users',
			'email' => 'required|email|max:255|unique:users,email',
			'password' => 'required|confirmed|min:8',
<<<<<<< HEAD
      '_dob' => 'required|date',
      'zip'=> 'required|numeric'
		]);
	}


  /**
=======
			'_dob' => 'required|date',
			'zip'=> 'required|numeric'
		]);
	}

	/**
>>>>>>> origin/master
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
<<<<<<< HEAD
	public function create(array $data)
	{
=======
	protected function create(array $data){
>>>>>>> origin/master
		$user = User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'_dob' => $data['_dob'],
		]);

		/**
		* Also Creating userData table during registration
		*/
		$user->userData()->updateOrCreate([
			// Data for Relationship table
			'zip'=> $data['zip']
		]);

		return $user;
	}

<<<<<<< HEAD
	// Look into bring authenticatesUsers methods into this controller.

=======
>>>>>>> origin/master
}

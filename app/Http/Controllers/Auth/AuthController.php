<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use BirknerAlex\XMPPHP\XMPP;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Mail\UserMail as Mailer;
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

  protected $mail;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Mailer $mail)
	{
		$this->middleware('guest', ['except'  => 'getLogout']);
    $this->Mailer = $mail;
	}

	/**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }

    /**
     * LAZ COPY from trait RegistersUsers (Apart of trait AuthenticatesAndRegistersUsers)
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        \Auth::login($this->create($request->all()));
        // $this->Mailer->sendNewUserWelcomeEmail(\Auth::user());
        // \IM::registerNewUser(\Auth::user()->username, $request->input('password'), $request->input('email') );


        return redirect($this->redirectPath());
    }

  // Look into bring authenticatesUsers methods into this controller.


  /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }



	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */

	public function validator(array $data){
		return Validator::make($data, [
			'username' => 'required|max:15|min:4|unique:users',
			'email' => 'required|email|max:255|unique:users,email',
			'password' => 'required|confirmed|min:8',
      '_dob' => 'required|date',
      'zip'=> 'required|numeric|min:6'
			]);
		}


	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data){
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
			'zip'=> $data['zip'],
			'profile_picture' => 'https://s3.amazonaws.com/test-laz/default-dp.jpg',
			'picture_name' => 'Default Picture'
		]);

		return $user;
	}

}

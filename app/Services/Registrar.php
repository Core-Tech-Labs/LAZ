<?php namespace App\Services;

use App\User;
use App\userData;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;


class Registrar implements RegistrarContract{

    /**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|max:15|min:4|unique:users',
			'email' => 'required|email|max:255|unique:users,email',
			'password' => 'required|confirmed|min:8',
      '_dob' => 'required|date',
      'zip'=> 'required|numeric'
		]);
	}


        /**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
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

}

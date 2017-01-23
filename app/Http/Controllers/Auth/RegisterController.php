<?php

namespace App\Http\Controllers\Auth;

use App\User;
use BirknerAlex\XMPPHP\XMPP;
use App\Mail\UserMail as Mailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
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
    protected function create(array $data)
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
            'zip'=> $data['zip'],
            'profile_picture' => 'https://s3.amazonaws.com/test-laz/default-dp.jpg',
            'picture_name' => 'Default Picture'
        ]);

        return $user;
    }
}
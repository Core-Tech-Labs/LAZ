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

    		return view('user.user', compact('UserData', 'aboutMeData'));
    	}


        public function store(){

        }

        /**
         * Show Other User Profiles
         * @param type $username
         * @return type
         */
        public function show(User $UserData){

            dd($UserData);
//           return view('user.user', compact('username'));
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
             $UserData->update($request->all());

            session()->flash('success_message', 'You have updated your profile Successfully!');
            return redirect('user');
        }


        /**
         * Function to upload users images
         * @return [type]
         */
        public function upload(User $UserData, Request $request){

            dd($request->file('file'));
            // $file = $request->file('file');
            // $rules = [
            //         'file' => 'image|max:3000',
            // ];

            // $validation = Validator::make($file, $rules);

            // if($validation->fails()){
            //     session()->flash('error', 'You had an image error');
            // }


            // $name = time() . $file->getClientOriginalName();

            // $file->move('user/photo', $name);

            // return 'Uploaded';

        }

        public function dp(Request $request){
            $file = $request->file('file');
        }


}
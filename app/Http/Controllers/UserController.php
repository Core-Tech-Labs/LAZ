<?php
namespace App\Http\Controllers;

use Request;
use App\User;
use App\Feeds;
use App\Online;
use App\userData;
use App\UsersPhotos;
use LAZ\Users\UsersOrigin;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation;
use Illuminate\Contracts\Filesystem\Factory as Filesystem;

class UserController extends Controller {

    protected $usersOrigin;

    	/**
    	 * Create a new controller instance.
    	 *
    	 * @return void
    	 */
    	public function __construct(UsersOrigin $usersOrigin)
    	{
    		$this->middleware('auth');
            $this->usersOrigin = $usersOrigin;
    	}

    	/**
    	 * Show the application dashboard to the user.
    	 *
    	 * @return Response
    	 */
        public function home(userData $UserData, Online $online){

            $online->UpdateIdleUser();
            $activeuser = $online->OnlineUsers();

            $users = $this->usersOrigin->getDashboardPaginated();

            return view('user.home', compact('users', 'activeuser', 'UserData') );
        }

        /**
         * function to show Current logged in user profile all data from source
         * @return type
         */
    	public function index(User $UserData, Online $online)
    	{
            $activeuser = $online->loggedInUser();
            // $user = $this->usersOrigin->findUsernameBy($UserData);
    		return view('user.user', compact('UserData', 'activeuser') );
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
        public function upload(Request $request, UsersPhotos $photo){ /*To Stay*/
            $this->Validate($request,[
                'file' => 'required|max:3000|mimes:jpg,jpeg,png',
            ]);

            $photo->UsersUploadedImages($request->file('file'), \Auth::user() );

            session()->flash('success_message', 'You have Uploaded your images Successfully');
            return redirect('user');
        }

        /**
         * Handling Users Profile Pictures Uploads
         * @param  UsersPhotos $photo [description]
         * @return [type]             [description]
         */
        public function dp(Request $request, UsersPhotos $photo){ /*To Stay*/
             $this->Validate($request,[
                'file' => 'required|max:3000|mimes:jpg,jpeg,png',
            ]);

            $photo->UserProfilePicture( $request->file('dp'), \Auth::user() );
        }


}
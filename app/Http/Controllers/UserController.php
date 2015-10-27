<?php
namespace App\Http\Controllers;

use Image;
use Redis;
use Storage;
use App\User;
use App\Online;
use App\Feeds;
use App\userData;
use App\UsersPhotos;
use Illuminate\Http\Request;
use App\Http\LAZ\Users\UsersOrigin;
use Illuminate\Contracts\Validation;
use App\Http\Controllers\Controller;

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
        public function home(User $user, Online $online){

            $online->UpdateIdleUser();
            $activeuser = $online->OnlineUsers();

            $users = $this->usersOrigin->getDashboardPaginated();

            return view('user.home', compact('users', 'activeuser'));
        }

        /**
         * function to show Current logged in user profile all data from source
         * @return type
         */
    	public function index(User $UserData, Online $online)
    	{
            $activeuser = $online->loggedInUser();
            // $user = $this->usersOrigin->findUsernameBy($UserData);
    		return view('user.user', compact('UserData', 'activeuser'));
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
        public function upload(User $UserData, UsersPhotos $photo, Request $request){
            // Photo(s) Validation
            $this->Validate($request,[
                'file' => 'required|max:3000|mimes:jpg,jpeg,png',
            ]);

            $file = $request->file('file'); // Collects the file from user upload

            // For regular Images
            $Imagename = time().$file->getClientOriginalName(); // Gives the file its name
            $userfilepath = $UserData->getUsername(); // Get current username to define directory
            $holder = Storage::disk('userPhotos')->put($userfilepath.'/'.$Imagename, '');// Prep Image for disk on folder


            //Create thubmnail
            $thmname = time().$file->getClientOriginalName(); // Thumbnail naming
            $thmfilepath = Storage::disk('userPhotos')->put($userfilepath.'/tn_/'.$thmname, '');


            $image = Image::make($file)->fit(115)->save($thmname); // For Thumbnail image save

            $file->move($holder, $Imagename); // For original Image save

            //Create New Image Upload Instance to database
            $UserData->usersImages()->create([
                    'image_path' => $holder.'/'.$Imagename,
                    'image_thumbnail' => $thmfilepath.'/'.$thmname,
                    'image_name' => $file->getClientOriginalName(),
            ]);

            // Ending Upload
            session()->flash('success_message', 'You have Uploaded your images Successfully');
        }

        public function dp(Request $request){
            $file = $request->file('file');
            session()->flash('success_message', 'Profile Picture Updated');
        }


}
<?php
namespace App\Http\Controllers;

use Redis;
use App\User;
use App\Feeds;
use App\Online;
use App\userData;
use App\UsersPhotos;
use Core\Users\UsersOrigin;
use Illuminate\Http\Request;
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
    public function home(User $UserData, Online $online){

        $online->UpdateIdleUser();
        $users = $this->usersOrigin->getDashboardPaginated();
        $UserNewsFeed = Redis::lrange('timeline:'.\Auth::user()->id, 0 ,-1);

        return view('user.home', compact('users', 'UserNewsFeed') );
    }

    /**
     * function to show Current logged in user profile all data from source
     * @return type
     */
	public function index(User $UserData)
	{
        $UserNewsFeed =  Redis::lrange('newsFeed:'.$UserData->username, 0, -1);
		return view('user.user', compact('UserData','UserNewsFeed') );
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
        return back();
    }


    /**
     * Function to upload users images
     * @return [type]
     */
    public function upload(Request $request, UsersPhotos $photo){
        $this->Validate($request,[
            'file' => 'required|max:3000|mimes:jpg,jpeg,png',
        ]);
        $photo->UsersUploadedImages($request->file('file'), \Auth::user() );
        session()->flash('success_message', 'You have Uploaded your images Successfully');
        return back();
    }

    /**
     * Handling Users Profile Pictures Uploads
     * @param  UsersPhotos $photo [description]
     * @return [type]             [description]
     */
    public function dp(Request $request, UsersPhotos $photo){
         $this->Validate($request,[
            'dp' => 'required|max:3000|mimes:jpg,jpeg,png',
        ]);
        $photo->UserProfilePicture( $request->file('dp'), \Auth::user() );
        session()->flash('success_message', 'Your Profile Picture has been updated');
        return back();
    }


}

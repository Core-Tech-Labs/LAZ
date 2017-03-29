<?php
namespace App\Http\Controllers;

use Redis;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ActivityController extends Controller {


	/**
	 *
	 */
	public function __construct(){

		$this->middleware('auth');
	}

	/**
	 * Show all activities of user
	 *
	 */
	public function show(User $user)
	{
		$UserNewsFeed = Redis::lrange('timeline:'.\Auth::id(), 0 ,-1);
		return view('user.activity', compact('UserNewsFeed'));
	}

	/**
	 * Marking Notifications as read
	 * @return [type] [description]
	 */
	public function markBellAsRead(){
		\Auth::user()->unreadNotifications->markAsRead();
	}

}

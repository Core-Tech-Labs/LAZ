<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use App\Jobs\FavAUser;
use App\Jobs\UnFavAUser;
use Core\Users\UsersOrigin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Users\Mail\FavAUserMail as Mail;
use App\Notifications\FavAUserNotification;
use Illuminate\Foundation\Bus\DispatchesCommands;



class FavController extends Controller {


	protected $mail;
	protected $usersOrigin;


	/**
	 * Embedding UsersOrigin class
	 * Embedding Mail class
	 */
	public function __construct(UsersOrigin $usersOrigin, Mail $mail){

		$this->mail = $mail;
		$this->middleware('auth');
		$this->usersOrigin = $usersOrigin;
	}

	/**
	 * Display a listing of Users favorited.
	 *
	 * @return Response
	 */
	public function index(User $user)
	{
		$favList = $user->favoritedList();
		$favedList = $user->favoriteeList();
		$fav = $this->usersOrigin->getFavoritingUsers();
		$faved = $this->usersOrigin->getFavoritedUsers();

		return view('user.fav', compact('fav', 'faved', 'favList', 'favedList'));
	}

	/**
	 * Fav A User
	 *
	 * @return Response
	 */
	public function store(User $user, Request $request)
	{
		// Favoriting
		$input = $request->input('userIDToFav');
		$clear = $this->dispatch(new FavAUser(\Auth::id(), $input));


		// Emailing
		$findingUser = $user->find($request->input('userIDToFav'));
		$this->mail->sendFavAUserNotificationEmail($findingUser, $request->input('userFaved'), Auth::user()->username);

		//Notifications
		$favedUser = $user->where('username', $request->input('userFaved'))->first();
		$favedUser->notify(new FavAUserNotification(\Auth::user()->username, $request->input('userFaved') ) );


		session()->flash('success_message','You are now following');
		return back();
	}

	/**
	 * UnFav a user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$input = $request->input('userIDToUnFav');
		$clear = $this->dispatch(new UnFavAUser(\Auth::id(), $input ));

		session()->flash('success_message', 'You have unfollowed ' . $request->get('userNmToFav') );
		return back();
	}

}

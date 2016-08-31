<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Core\Users\UsersOrigin;
use Illuminate\Http\Request;
use App\Commands\FavAUserCommand;
use App\Commands\UnFavAUserCommand;
use App\Http\Controllers\Controller;
use Core\Users\Mail\FavAUserMail as Mail;
use Illuminate\Foundation\Bus\DispatchesCommands;



class FavController extends Controller {


	protected $mail;
	protected $usersOrigin;


	/**
	 * [__construct description]
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
		$input = array_add($request, 'userID', Auth::id() );
		$clear = $this->dispatchFrom(FavAUserCommand::class, $input);

		// For emailing User Fav
		$findingUser = $user->find($request->input('userIDToFav'));
		$this->mail->sendFavAUserNotificationEmail($findingUser, $request->input('userFaved'), Auth::user()->username);


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
		$input = array_add($request, 'userID', Auth::id() );
		$clear = $this->dispatchFrom(UnFavAUserCommand::class, $input);

		session()->flash('success_message', 'You have unfollowed ' . $request->get('userNmToFav') );
		return back();
	}

}

<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Commands\FavAUserCommand;
use App\Http\LAZ\Users\UsersOrigin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;


class FavController extends Controller {


	protected $usersOrigin;

	/**
	 * [__construct description]
	 */
	public function __construct(UsersOrigin $usersOrigin){

		$this->middleware('auth');
		$this->usersOrigin = $usersOrigin;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(User $user)
	{
		$users = $this->usersOrigin->getFavPaginated();

		return view('user.fav', compact('users'));
	}

	/**
	 * Fav A User
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = array_add($request, 'userID', Auth::id() );
		$this->dispatchFromArray(FavAUserCommand::class, [
					'userID' => $request->get(Auth::id()),
					'userIDToFav' => $request->get('userIDToFav'),
		]);

		session()->flash('success_message','You are now following' . $request->get('userIDToFav'));
		return \Redirect::back();
	}

	/**
	 * UnFav a user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\LAZ\Users\UsersOrigin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use App\Online;
use App\userData;
use App\UsersPhotos;
use LAZ\Users\UsersOrigin;
use App\Http\Controllers\Controller;


class TestController extends Controller {

	protected $usersOrigin;

        /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(UsersOrigin $usersOrigin)
	{
		$this->usersOrigin = $usersOrigin;
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function rudy(Online $online, User $user, UsersPhotos $userPhotos)
	{
    // $users = $this->usersOrigin->getDashboardPaginated();
		// dd($user->Online()->loggedInUser() );
		// dd($users);
		//
		dd($user->userData());

	}

//	/**
//	 * Show the form for creating a new resource.
//	 *
//	 * @return Response
//	 */
//	public function create()
//	{
//		//
//	}
//
//	/**
//	 * Store a newly created resource in storage.
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//		//
//	}
//
//	/**
//	 * Display the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show($id)
//	{
//		//
//	}
//
//	/**
//	 * Show the form for editing the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//		//
//	}
//
//	/**
//	 * Update the specified resource in storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		//
//	}
//
//	/**
//	 * Remove the specified resource from storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		//
//	}
//
}

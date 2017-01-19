<?php
namespace Core\Users;

use App\User;

class UsersOrigin{



    public function save(User $user){
      $user->save();
    }

    /**
     * Shows Users on homepage/dashboard
     * @param  integer $manyUsers [description]
     * @return [type]             [description]
     */
    public function getDashboardPaginated(){
      return User::orderBy('id', 'asc')->with('userData')->where('id', '!=', \Auth::id())->paginate(3);
    }

    /**
     * List of User who current user favorited
     * @return [type] [description]
     */
    public function getFavoritingUsers(){
        $user = \Auth::user();
        return $user->with('userData')->find($user->favoritedList());

    }

    /**
     * List of Users who favorited the current user
     * @return [type] [description]
     */
    public function getFavoritedUsers(){
        $user = \Auth::user();
        return $user->with('userData')->find($user->favoriteeList());
    }

    /**
     * [findUsernameBy description]
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function findUsernameBy($username){
      return User::whereUsername($username)->first();
    }

    /**
     * Find user via ID
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function findById($id){

        return User::findOrFail($id);
    }

    /**
     * Favorite a user
     * @param  [type] $userIDToFav Other Users ID
     * @param  User   $user        Auth::id() User (User who's doing the Favoriting)
     * @return [type]              [description]
     */
    public function favoriteUser($userIDToFav, User $user){
      return $user->favUsers()->attach($userIDToFav);
    }

    /**
     * Unfavorite a user
     * @param  [type] $userIdToUnFav [description]
     * @param  User   $user          [description]
     * @return [type]                [description]
     */
    public function unfavoriteUser($userIDToUnFav, User $user){
      return $user->favUsers()->detach($userIDToUnFav);
    }
}
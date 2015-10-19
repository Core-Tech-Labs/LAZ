<?php

namespace App\Http\LAZ\Users;

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
    public function getDashboardPaginated($manyUsers = 15){
      return User::orderBy('username', 'asc')->paginate($manyUsers);
    }

    public function getFavPaginated($manyUsers = 24){
      return User::orderBy('id', 'asc')->paginate($manyUsers);
    }

    public function findUsernameBy($username){
      return User::whereUsername($username)->first();
    }

    /**
     * Favorite a user
     * @param  [type] $userIdToFav [description]
     * @param  User   $user        [description]
     * @return [type]              [description]
     */
    public function favoriteUser($userIdToFav, User $user){
      return $user->favUser()->attach($userIdToFav);
    }

    /**
     * Unfavorite a user
     * @param  [type] $userIdToUnFav [description]
     * @param  User   $user          [description]
     * @return [type]                [description]
     */
    public function unfavoriteUser($userIdToUnFav, User $user){
      return $user->favUser()->detach($userIdToUnFav);
    }
}
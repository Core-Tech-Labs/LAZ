<?php

namespace LAZ\Users;

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
     * @param  [type] $userIDToFav [description]
     * @param  User   $user        [description]
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
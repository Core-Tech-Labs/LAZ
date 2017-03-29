<?php

namespace Core\Users;


trait ActionableTrait{

  /**
   * List of users that the current user faved.
   *
   * @return [type] [description]
   */
  public function favUsers(){

      return $this->belongsToMany(static::class, 'favs', 'favoritee_id', 'favorited_id' )->withTimestamps();
  }

  /**
   * list of users who favorited the current user
   *
   * @return [type] [description]
   */
  public function favs(){

      return $this->belongsToMany(static::class, 'favs', 'favorited_id', 'favoritee_id')->withTimestamps();
  }

  /**
   * See if current user follows another user.
   *
   * @param  User    $auth [description]
   * @return boolean            [description]
   */
  public function CheckFavorited(){

    $auth = \Auth::user();

    $list = $auth->favUsers()->pluck('favorited_id')->toArray();

    return in_array($this->id, $list);
  }

  /**
     * id's of users who current user favorited
     * @return array
     */
    public function favoritedList(){
        $user = \Auth::user();
        return $user->favUsers()->pluck('favorited_id')->toArray();
    }

    /**
     * id's of users who favorited current user
     * @return array
     */
    public function favoriteeList(){
        $user = \Auth::user();
        return $user->favs()->pluck('favoritee_id')->toArray();
    }

}
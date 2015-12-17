<?php
namespace LAZ\Users;


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
   * @param  User    $webweeven [description]
   * @return boolean            [description]
   */
  public function CheckFavorited(){

    $webweeven = \Auth::user();

    $ctlMade = $webweeven->favUsers()->lists('favorited_id')->toArray();

    // dd($this->id);
    return in_array($this->id, $ctlMade);
  }

}
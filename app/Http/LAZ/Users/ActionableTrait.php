<?php
namespace App\Http\LAZ\Users;

use App\User;

trait ActionableTrait{

  /**
   * List of users that the current user follows.
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
   * @param  User    $otherUser [description]
   * @return boolean            [description]
   */
  public function isFavedBy(User $otherUser){

    $idsWhoOtherUserFaved = $otherUser->favUsers()->lists('favorited_id');

    return in_array($this->id, $idsWhoOtherUserFaved);
  }

}
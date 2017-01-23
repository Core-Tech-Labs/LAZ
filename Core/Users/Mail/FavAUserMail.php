<?php
namespace Core\Users\Mail;

class FavAUserMail extends Mail{

  /**
   * Sending Email to User Being Favorited
   * @param  [type] $user      User Object (User Being Favorited)
   * @param  [type] $userFaved User Being Favorited
   * @param  [type] $faveeUser User Favoriting
   * @return [type]            [description]
   */
  public function sendFavAUserNotificationEmail($user, $userFaved, $faveeUser){

      $subject = $faveeUser.' just Faved you on LAZ';
      $view = 'emails.favAUser';
      $data = ['favorited_username' => $userFaved, 'favoritee_username' => $faveeUser];


      return $this->deliver($user, $subject, $view, $data);

  }


}
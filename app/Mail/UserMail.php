<?php
namespace App\Mail;

use App\User;

class UserMail extends Mail{

  /**
   * Sending Welcome email to new user
   * @param  User   $user [description]
   * @return [type]       [description]
   */
  public function sendNewUserWelcomeEmail($user){

      $subject = 'Welcome to LAZ '.$user->username;
      $view = 'emails.welcome';
      $data = ['username' => $user->username, 'email' => $user->email];

      return $this->deliver($user, $subject, $view, $data);

  }


}
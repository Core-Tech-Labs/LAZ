<?php
namespace Core\NewsFeed\Mail;

class FeedsMailer extends Mail{

  /**
   * Sending Email notification that a user they faved posted a new Post
   * @param  [type] $user      User Object (User Being Favorited)
   * @param  [type] $userFaved User Being Favorited
   * @param  [type] $faveeUser User Favoriting
   * @return [type]            [description]
   */
  public function sendNewNotificationToUsers($user, $UserPosting){

      $subject = $user->username.','.$UserPosting.' just posted a new Update';
      $view = 'emails.NewFeedPost';
      $data = [
        'favoritee_username' => $user->username, 'UserPosting' => $UserPosting,

        ];


      return $this->deliver($user, $subject, $view, $data);

  }


}
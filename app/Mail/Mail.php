<?php
namespace App\Mail;

use Illuminate\Mail\Mailer;

abstract class Mail{

  private $mail;

  function __construct(Mailer $mail){
    $this->mail = $mail;
  }

  /**
   * Deliverable Method for all emails
   * @param  [type] $user    User Object
   * @param  [type] $subject Subject of Email
   * @param  [type] $view    HTML File for email
   * @param  array  $data    Arrays containing data passed to email template
   * @return [type]          [description]
   */
  public function deliver($user, $subject, $view, $data = []){
    $this->mail->queue($view, $data, function($message) use($user, $subject){
        $message->to($user->email)->subject($subject);

    });
  }

}
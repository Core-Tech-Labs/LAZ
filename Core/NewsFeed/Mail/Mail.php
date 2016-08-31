<?php
namespace Core\NewsFeed\Mail;


use Illuminate\Mail\Mailer;



abstract class Mail{



  private $mail;


  /**
   * [__construct description]
   * @param Mailer $mail [description]
   */
  function __construct(Mailer $mail){
    $this->mail = $mail;
  }

  /**
   * Deliverable Method for all emails
   * @return [type] [description]
   */
  public function deliver($user, $subject, $view, $data = []){
    $this->mail->queue($view, $data, function($message) use($user, $subject){
        $message->to($user->email)->subject($subject);

    });
  }

}
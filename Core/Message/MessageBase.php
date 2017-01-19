<?php

namespace Core\Message;

use App\User;
use Illuminate\Http\Request;


//RabbitMQ: http://192.168.10.20:15672/
//XMPP: http://192.168.10.20:5280/

class MessageBase{

  /**
   * [publish description]
   * @return [type] [description]
   */
  public function publish(Request $request){
    \IM::autoSubscribe();

    $toName = $request->input('UserConsumers');
    \IM::RosterAddUser($toName.'@localhost', $toName);
    \IM::message($toName.'@localhost', $request->input('message-body'), 'chat');


    \IM::disconnect();
  }


}
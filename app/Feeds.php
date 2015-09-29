<?php

namespace App;

use Redis;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{


    public function User(){
      return $this->belongsTo('App\User')
    }

    /**
     * Collecting Users Updates and passing it to the database
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public static function setFeeds(Request $request){
      $newsFeed = $request->all(); // Requesting all data from user input
      $redis = Redis::set();      // Initiating Redis

    }

    public static function getFeeds(){

    }
}

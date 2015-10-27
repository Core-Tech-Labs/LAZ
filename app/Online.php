<?php

namespace App;

use Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Online extends Model
{

    /**
     * [$table description]
     * @var string
     */
    protected $table = 'sessions';

    /**
     * [$hidden description]
     * @var array
     */
    protected $hidden = ['payload'];

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = false;

    /**
     * User Relationship to session
     * @return [type] [description]
     */
    public function user(){
      return $this->belongsTo('App\User');
    }

    /**
     * Show if logged in user is online
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeloggedInUser($query){
        return $query->select('user_id')->get();
    }

    /**
     * Show Users with latest activity
     * @param  Builder $query [description]
     * @return [type]         [description]
     */
    public function scopeOnlineUsers($query, $timeLimit = 10){
        $latest = strtotime(Carbon::now() );
        return $query->whereNotNull('user_id')->where('last_activity', '>=', $latest)->with('user');
    }

    /**
     * Show a count of all online users on application
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function countOnlineUsers($query){
        return $query->whereNotNull('user_id')->with('user')->count();
    }

    /**
     * [scopeRegisteredUsers description]
     * @return [type] [description]
     */
    public function scopeRegistered(Builder $query){
      return $query->whereNotNull('user_id')->with('user');
    }

    /**
     * [scopeUserIdle description]
     * @return [type] [description]
     */
    public function scopeUpdateIdleUser(Builder $query){
      return $query->where('id', Session::getId())->update([
          'user_id' => \Auth::id()
        ]);
    }

}



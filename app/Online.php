<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
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
     * [$fillable description]
     * @var array
     */
    protected $fillable = ['user_id'];

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
     * Show Users with latest activity
     * @param  Builder $query [description]
     * @return [type]         [description]
     */
    public function scopeOnlineUsers($query, $timeLimit = 10){
        $latest = strtotime(Carbon::now()->subMinutes($timeLimit) );
        return $query->whereNotNull('user_id')->where('last_activity', '>=', $latest)->with('user');
    }

    /**
     * [scopeRegisteredUsers description]
     * @return [type] [description]
     */
    public function scopeRegistered($query, $timeLimit = 10){
      return $query->whereNotNull('user_id')
      ->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes($timeLimit) ))
      ->with('user');
    }

    /**
     * [scopeUserIdle description]
     * @return [type] [description]
     */
    public function scopeUpdateIdleUser($query){
      return $query->where('id', Session::getId())->update([
          'user_id' => ! empty(\Auth::id()) ? \Auth::user()->id : null
        ]);
    }

}



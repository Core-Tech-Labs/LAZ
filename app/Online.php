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
     * Returns users with latest activity
     * @return [type] [description]
     */
    public function scopeRegistered($query, $timeLimit = 10){
      return $query->whereNotNull('user_id')
      ->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes($timeLimit) ))
      ->with('user');
    }

    /**
     * Updates idle user
     * @return [type] [description]
     */
    public function scopeUpdateIdleUser($query){
      return $query->where('id', Session::getId())->update([
          'user_id' => ! empty(\Auth::id()) ? \Auth::user()->id : null
        ]);
    }

}



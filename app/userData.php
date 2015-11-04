<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class userData extends Model {

    protected $table = 'userData';

    protected $fillable = ['zip', 'profile_picture', 'picture_name', 'user_dp_rename'];

    protected $dates = ['timestamps'];


    /**
     * Relationship declaration by the User table
     *
     * @return type
     */
    protected function user(){
        return $this->belongsTo('App\User');
    }


    // Set and Define your Accessors and Mutators

}

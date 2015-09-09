<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class userData extends Model {

    protected $table = 'userData';

    protected $fillable = ['zip'];

    protected $dates = ['timestamps'];


    /**
     * Relationship declaration by the User table
     *
     * @return type
     */
    protected function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Getting users zip code
     * @return object
     */
    protected function getUserZip() {
        // $users = DB::tables('users')->max('zip');
        $zip = '10001'; // Need to fix
        return $zip;
    }

    // Set and Define your Accessors and Mutators

}

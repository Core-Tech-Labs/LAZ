<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

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
        $zip = DB::tables('userData')->max('zip');
        return $zip;
    }

    // Set and Define your Accessors and Mutators

}

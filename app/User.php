<?php
namespace App;

use DB;
use Storage;
use Carbon\Carbon;
use Core\Users\ActionableTrait;
use Symfony\ComponentHttpFoundation\File;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {


	use ActionableTrait, Notifiable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'users';

    /**
     * Values that are Mass assigned
     * @var [type]
     */
	protected $fillable = ['username', '_dob', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id', 'password', 'remember_token'];


    /**
     * Defining what should be created as Carbon dates
     * @var [type]
     */
    protected $dates = ['timestamps', '_dob'];


    /**
     * Declaring userData one-to-one relationship
     *
     */
    public function userData(){
        return $this->hasOne('App\userData');
    }

    /**
     * Declaring userImages hasMany relationship
     * @return [type]
     */
    public function usersPhotos(){
        return $this->hasMany('App\UsersPhotos');
    }

    /**
     * Declaring Feeds hasMany relationship
     * @return [type] [description]
     */
    public function Feeds(){
        return $this->hasMany('App\Feeds');
    }

    /**
     * [Online description]
     */
    public function Online(){
        return $this->hasOne('App\Online');
    }

    /**
     * Responsible for Converting Users Date of Birth from MM/DD/YYYY to
     * the unix format which is YYYY-mm-dd H:i:s
     *
     * @param type $dob
     */
    protected function setDobAttribute($dob){
        $this->attributes['_dob'] = Carbon::parse($dob);
    }

    /**
     * This function is responsible for calculating users birthdate with
     * Carbon::now(); and producing an age.
     *
     * @return integer
     */
    protected function getAge(){
        $users = DB::table('users')->max('_dob');
        $dob = Carbon::parse($users);
        $now = Carbon::now();
        return $dob->diffInYears($now);
    }

    public function scopeUsername($query){
        return $query->where('username');
    }

}

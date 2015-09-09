<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Carbon\Carbon;
use DB;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $fillable = ['username', '_dob', 'email', 'password'];

        protected $table = 'users';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id', 'password', 'remember_token'];


        protected $dates = ['timestamps', '_dob'];


        /**
         * Declaring userData one-to-one relationship
         *
         */
        public function userData(){
            return $this->hasOne('App\userData');
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

}

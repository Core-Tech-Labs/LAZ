<?php
namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File;


class UsersPhotos extends Model {

  /**
   * Declearing usersImages
   * @var string
   */
  protected $table = 'usersImages';

  /**
   * Declearing Fillable columns
   * @var array
   */
  protected $fillable = ['image_path', 'image_name', 'image_thumbnail'];

  protected $dates = ['timestamps'];

  /**
   * Relationship to the User Model
   * @return App\User
   */
  public function user(){
    return $this->belongsTo('App\User');
  }

  public static function requestImage(UploadedFile $file){

    $photo = new static;

    $Imagename = time().$file->getClientOriginalName(); // Gives the file its name

    $userfilepath = $UserData->getUsername(); // Get current username to define directory

    $holder = Storage::disk('userPhotos')->put($userfilepath.'/'.$Imagename, '');// Prep Image for disk on folder

    return $photo;

  }




}

<?php
namespace App;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Contracts\Filesystem\Factory as Filesystem;


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

  /**
   * Declaring Dates
   * @var array
   */
  protected $dates = ['timestamps'];

  /**
   * Relationship to the User Model
   * @return App\User
   */
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function scopeImages($query){
    return $query->whereNotNull('user_id');
  }

//

  /**
   * Saving and Renaming Users Images
   * @param UploadedFile $file Library for Uploading Files Locally or Cloud
   * @param User         $user Users Model
   */
  public function UsersUploadedImages(UploadedFile $file, User $user){
      $Image = $file->getClientOriginalName();
      $Imagename = time().$Image;
      $file->move(\Auth::User()->username.'/', $Imagename);
      $user->usersPhotos()->updateOrCreate([
              'image_path' => '/'.\Auth::User()->username.'/'.$Imagename,
              'image_name' => $Imagename,
      ]);
  }


  /**
   * Saving and Database Recording Users Default Picture
   * @param UploadedFile $file Library for Uploading Files Locally or Cloud
   * @param User         $user Users Model
   */
  public function UserProfilePicture(UploadedFile $file, User $user){
      $Image = $file->getClientOriginalName();
      $Imagename = 'DP_'.$Image;
      $file->move(\Auth::User()->username.'/profile_images/', $Imagename);
      $user->userData()->update([
              'profile_picture' => '/'.\Auth::User()->username.'/profile_images/'.$Imagename,
              'picture_name' => $Imagename

      ]);

  }

}

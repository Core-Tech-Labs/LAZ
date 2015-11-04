<?php
namespace App;

use Request;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File;
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

  protected $dates = ['timestamps'];

  /**
   * Relationship to the User Model
   * @return App\User
   */
  public function user(){
    return $this->belongsTo('App\User');
  }

  /**
   * Business logic for saving images
   * @param Request    $request    [description]
   * @param User       $user       [description]
   * @param Filesystem $filesystem [description]
   */
  public function UsersUploadedImages(Request $request, User $user, Filesystem $filesystem){
    // Photo(s) Validation
      $this->Validate($request,[
          'file' => 'required|max:3000|mimes:jpg,jpeg,png',
      ]);

      $file = $request->file('file');
      $Imagename = time().$file->getClientOriginalName();

      $ProfilePicturePath = $filesystem->disk('s3')->put($user->username.'/'.$Imagename, '');
      //Create New Image Upload Instance to database
      $user->usersPhotos()->create([
              'image_path' => $ProfilePicturePath,
              'image_name' => $Imagename,
      ]);

  }


  /**
   * Business logic for saving users Profile Picture
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function UserProfilePicture(Request $request, User $user, Filesystem $filesystem){
      $this->Validate($request,[
          'file' => 'required|max:3000|mimes:jpg,jpeg,png',
      ]);

      $file = $request->file('file');
      $Imagename = .'DP'.time().$file->$user->username;
      $ProfilePicturePath = $filesystem->disk('s3')->put($user->username.'/'.$Imagename, '');

      //Create New Image Upload Instance to database
      $user->userData()->create([
              'profile_picture' => $ProfilePicturePath,
              'picture_name' => $Imagename

      ]);

  }


}

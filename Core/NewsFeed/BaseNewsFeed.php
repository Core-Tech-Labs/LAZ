<?php
namespace Core\NewsFeed;

use Redis;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewsFeed;


class BaseNewsFeed{

  /**
   * Storing All Users Post
   * @return [type] [description]
   */
  public function UsersNewsFeed(NewsFeed $request, User $user){
        //Ignore
        $newsFeed = $request->except('_token');

        //For NewsFeed
        $username = $request->input('UserPosting');
        $usernameUpdate = $request->input('UserNameBeingUpdated');

        //For Timelines
        $userID = $request->input('UserPostingID');

        // For Single User posting
        $id = Redis::incr('total_post_id');
        Redis::hset('list_post_id', $username, $id );

        Redis::lpush('newsFeed'.':'.$username,  json_encode($newsFeed));

        // Cross Users Posting
        if($usernameUpdate == true){
            Redis::lpush('newsFeed'.':'.$usernameUpdate, json_encode($newsFeed));
        }

        /**
         * Minor Bug.
         * If someone (who you're not following) posts on your newsfeed it should also show up on your timeline also
         */

        // Timeline
        Redis::lpush('timeline'.':'.$userID, json_encode($newsFeed));

        $faveID = $user->favoriteeList();

        // Users Following Timeline
        if($faveID == true ){
            foreach ($faveID as $id ) {
                Redis::lpush('timeline:'.$id, json_encode($newsFeed));
            }
        }
  }

  public function deletingNewsItem(Request $request){
        $newsFeed = $request->except('_token');
        $userID = $request->input('UserPostingID');

        Redis::lrem('newsFeed'.':'.\Auth::user()->username, 0,  $request->input('DataToDelete'));
        Redis::lrem('timeline'.':'.$userID, 0, $request->input('DataToDelete'));
  }


}
<?php

namespace App\Jobs;

use App\Jobs\Job;
use Core\Users\UsersOrigin;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class FavAUser extends Job implements ShouldQueue
{

    use InteractsWithQueue, SerializesModels;

    public $userID;

    public $userIDToFav;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userID, $userIDToFav)
    {

        $this->userID = $userID;

        $this->userIDToFav = $userIDToFav;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(UsersOrigin $UsersOrigin)
    {
        $fav = $UsersOrigin->findById($this->userID);

        $UsersOrigin->favoriteUser($this->userIDToFav, $fav);
        return $fav;

    }


}

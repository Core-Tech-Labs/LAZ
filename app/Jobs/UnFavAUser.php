<?php

namespace App\Jobs;

use App\Jobs\Job;
use Core\Users\UsersOrigin;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnFavAUser extends Job implements ShouldQueue
{

    use InteractsWithQueue, SerializesModels;

    public $userID;

    public $userIDToUnFav;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userID, $userIDToUnFav)
    {
        $this->userID = $userID;
        $this->userIDToUnFav = $userIDToUnFav;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(UsersOrigin $UsersOrigin)
    {
        $unFav = $UsersOrigin->findById($this->userID);
        $UsersOrigin->unfavoriteUser($this->userIDToUnFav, $unFav);

    }
}

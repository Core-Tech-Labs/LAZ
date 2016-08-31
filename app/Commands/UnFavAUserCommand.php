<?php

namespace App\Commands;

use App\Commands\Command;
use Core\Users\UsersOrigin;
use Illuminate\Contracts\Bus\SelfHandling;

class UnFavAUserCommand extends Command implements SelfHandling
{

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

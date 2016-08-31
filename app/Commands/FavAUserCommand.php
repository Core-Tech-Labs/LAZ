<?php

namespace App\Commands;

use App\Commands\Command;
use Core\Users\UsersOrigin;
use Illuminate\Contracts\Bus\SelfHandling;


class FavAUserCommand extends Command implements SelfHandling
{

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

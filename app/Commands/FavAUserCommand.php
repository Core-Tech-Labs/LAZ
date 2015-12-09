<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Handlers\Commands\FavAUserCommandHandler;

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
    public function handle()
    {
        //
    }


}

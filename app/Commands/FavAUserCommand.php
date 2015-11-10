<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Handlers\Commands\FavAUserCommandHandler;

class FavAUserCommand extends Command implements SelfHandling
{

    public $userID;

    public $userIDToFav;

    // protected $userRepo;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userID, $userIDToFav)
    {
        // $this->userRepo = $userRepo;

        $this->userID = $userID;

        $this->userIDToFollow = $userIDToFav;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        // event(new FavAUserCommandHandler);
    }
}

<?php
namespace App\Handlers\Commands;

use App\Commands\FavAUserCommand;
use Illuminate\Queue\InteractsWithQueue;

class FavAUserCommandHandler implements CommandHandler
{

    protected $userRepo;
    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command.
     *
     * @param    $command
     * @return void
     */
    public function handle(FavAUserCommand $command)
    {
        //demo

       $user = $this->userRepo->findById($command->userID);

       $this->userRepo->favoriteUser($command->userIDToFav, $user);

       return $user;
    }
}

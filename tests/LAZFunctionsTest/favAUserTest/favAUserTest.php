<?php
namespace LAZFunctionsTest\favAUserTest;

use TestCase;
use App\Commands\FavAUserCommand;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class favAUserTest extends TestCase
{
  public function testFavoritingAUser(){
      $this->assertTrue(true);
  }

}

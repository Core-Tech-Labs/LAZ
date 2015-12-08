<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class favUsers extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function favAUser(){
      $this->visits('/_username')
           ->see('username')
           ->see('Add Fav')
           ->click('Add Fav')
           ->press('Add Fav')
           ->see('Faved User');
    }
}

<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersSeedTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 100) as $index){
          User::create([
            'email'=> $faker->email,
            'username' => $faker->word . $index,
            'password' =>  Hash::make('password'),
            '_dob' => $faker->date,
            ]);
        }
    }
}

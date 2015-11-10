<?php

use App\User;
use App\userData;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersDataSeedTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $usersID =  User::lists('id')->toArray();

        foreach(range(1, 100) as $index){

          userData::create([
              'user_id' => $faker->randomElement($usersID),
              'zip'=> $faker->postcode,
              'profile_picture' => 'https://s3.amazonaws.com/test-laz/default-dp.jpg',
              'picture_name' => 'Default Picture',
            ]);
        }
    }
}

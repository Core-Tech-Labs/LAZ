<?php

use App\User;
use App\userData;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CodeceptSeedTwo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $usersID =  User::pluck('id')->toArray();

        foreach(range(1, 1) as $index){
          User::create([
            'email'=> 'master@email.com',
            'username' => 'master',
            'password' =>  Hash::make('password'),
            '_dob' => $faker->date,
            ]);

          userData::create([
              'user_id' => '2',
              'zip'=> $faker->postcode,
              'profile_picture' => 'https://s3.amazonaws.com/test-laz/default-dp.jpg',
              'picture_name' => 'Default Picture',
            ]);

        }
    }
}


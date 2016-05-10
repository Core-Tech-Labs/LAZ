<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	protected $tables = ['users', 'userData'];

	protected $seeders = ['UsersSeedTables', 'UsersDataSeedTables'];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');


		$this->cleanDatabase();

		foreach($this->seeders as $seedClasses){
			$this->call($seedClasses);
		}

	}

	private function cleanDatabase(){

		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach($this->tables as $table){
				DB::table($table)->truncate();
			}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');


	}

}

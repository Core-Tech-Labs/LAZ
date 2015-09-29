<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
<<<<<<< HEAD
=======
	 * The Base URL
>>>>>>> origin/master
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://localhost';

<<<<<<< HEAD
=======

>>>>>>> origin/master
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */

	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

}

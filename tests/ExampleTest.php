<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function welcomeAndLoginUser(){
		$this->visits('/')
				 ->see('LAZ')
				 ->see('Log In')
				 ->click('/login')
				 ->seePageIs('/login')
				 ->type('email@email.com', 'email')
				 ->type('password', 'password')
				 ->press('login')
				 ->seePageIs('/home');
	}

	public function welcomeAndRegisterUser(){
		$this->visits('/')
				 ->see('LAZ')
				 ->see('Register')
				 ->click('/register')
				 ->seePageIs('/register')
				 ->type('09/09/1920','_dob')
				 ->type('00000', 'zip')
				 ->type('username', 'username')
				 ->type('email@email.com', 'email')
				 ->type('password', 'password')
				 ->type('password', 'password_confirmation')
				 ->press('register')
				 ->seePageIs('/dashboard');
	}

}

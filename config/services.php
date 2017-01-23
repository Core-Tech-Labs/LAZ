<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'key' => '',
		'secret' => '',
	],

	'rollbar' => [
		'access_token' => env('ROLLBAR_ACCESS'),
		'environment' => 'development',
		'level' => 'debug'
	],

	'xmpp'=> [
				'host' => env('XMPP_HOST'),
				'port' => env('XMPP_PORT'),
				'user' => env('XMPP_USER'),
				'password'=> env('XMPP_PASSWORD'),
	],

];



<?php
namespace App\Exceptions;

use Exception;
use Rollbar\Rollbar;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Rollbar Error Handler
	 *
	 * @return [type] [description]
	 */
	public function rberrors(){
		$rollbar_config = Config::get('services.rollbar');

		if ($rollbar_config) {
			Rollbar::init($rollbar_config)
				App::error(function($request, $response)
				{
					Rollbar::flush();
				});
		}
	}


	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		$this->rberror();
		Rollbar::report_message('Could Not Test', 'warning');
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		$this->rberror();
		return parent::render($request, $e);
	}



}

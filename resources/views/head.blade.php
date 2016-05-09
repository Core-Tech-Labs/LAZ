<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LAZ | @yield('title')</title>

        <link href='//fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/laz.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/avatar.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/color.css') }}" rel="stylesheet">

        <!-- {{-- CSS version example
		/*
		* <link href="{{ elixir('/css/laz.css') }}" rel="stylesheet">
        --}} -->

	<!-- Fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
        <!-- Scripts -->

        <script text="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/jquery-ui.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

        <!-- JS librarys-->
        <script text="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/custom.js') }}"></script>
        <script src="{{ asset('js/react.js') }}"></script>
        <!--script src="{{ asset('js/JSXTransformer-react.js') }}"></script-->

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">LAZ</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
<!--					<li><a href="">Home</a></li>-->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
              <li><a href="{{ url('/message') }}"> Messages</a></li>
              <li><a href="{{ url('/favs') }}">My Favorites</a></li>
              <li><a href="{{ url('/extras') }}">Extras</a></li>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ $UserData->userData->profile_picture }}" class="img-circle" id="user-dp" profileimage="{{ $UserData->userData->profile_picture }}" /> <span class="caret"></span></a>
							 <ul class="dropdown-menu" role="menu">
                <li><a href="{{ action('UserController@index', $UserData->username ) }}">{{ Auth::user()->username }}</a></li>
                <li><a href="{{ action('SettingsController@edit', $UserData->username ) }}">Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
@include('flash-msg.flash')
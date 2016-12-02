<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LAZ | @yield('title')</title>


	      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/laz.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/avatar.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/color.css') }}" rel="stylesheet">


      	<!-- Fonts -->
      	<link href='//fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>

        <!-- Scripts -->
        <script text="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.5.3/jquery.timeago.js"></script> --}}

        <!-- JS librarys-->
        <script text="text/javascript" src="{{ asset('/js/time.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/custom.js') }}"></script>
        <script text="text/javascript" src="{{ asset('/js/rollbar.js') }}"></script>

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

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
              {{-- Message link goes here --}}
              <li><a href="{{ url('/favs') }}">My Favorites</a></li>
              <li><a href="{{ action('ActivityController@show', $UserData->username) }}">My Activity</a></li>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ $UserData->userData->profile_picture }}" class="img-circle" id="user-dp" profileimage="{{ $UserData->userData->profile_picture }}" /> <span class="caret"></span></a>
							 <ul class="dropdown-menu" role="menu">
                <li><a href="{{ action('UserController@index', $UserData->username ) }}" id="username" username="{{Auth::user()->username}}">{{ Auth::user()->username }}</a></li>
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

@yield('content')


 <div class="container-fluid footer">
    <div class="structure padding">
      <ul class="list-footer">
        <li><a href="">About Us</a></li>
      </ul>
      <ul class="list-footer">
        <li><a href="">Privacy Policy</a></li>
      </ul>
      <ul class="list-footer">
        <li><a href="">Terms of Use</a></li>
      </ul>
    </div>
    <div class="copyright">
      <!-- <div class="ctllogo"></div> -->
      <p>&copy; Copyright 2015 | Core Tech Labs, Inc<p>
    </div>
  </div>
</body>
</html>
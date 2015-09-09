<html>
	<head>
		<title>LAZ | The Open Source Social Network</title>

		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
                <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
                <link href="{{ asset('/css/cruz.css')}}" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="content">
                            @if (Auth::guest())
				<div class="title">LAZ <br/> The Open Source Social Network</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
                                <div class="btn-group" id="extra-welcome"><button type="button" class="btn btn-default btn-lg"><a href="{{ url('/register') }}"> Signup</a></button></div>
                                <div class="extra-welcome">Already a member? <a href="{{ url ('/login') }}">Login in.</a></div>
                            @else

                            <h1>Hi {{ Auth::user()->name }}</h1>

                            @endif
			</div>
		</div>
	</body>
</html>

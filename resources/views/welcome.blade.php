@extends('master')
@section('title', 'Welcome')
@section('content')
		<div class="container-fluid">
			<div class="content">
				<div class="title">LAZ <br/> The Open Source Social Network</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
		</div>
@endsection

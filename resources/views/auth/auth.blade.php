@extends('master')
@section('content')
<div class="auth-background">
    <div class="extra-title">{{ Inspiring::quote() }}</div>
</div>
	@yield('auth-content')

@endsection
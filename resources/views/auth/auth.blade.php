@include('head')
<div class="auth-background">
    <div class="extra-title">{{ Inspiring::quote() }}</div>
</div>
	@yield('auth-content')

@include('footer')
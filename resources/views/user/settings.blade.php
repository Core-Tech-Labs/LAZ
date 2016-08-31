@extends('master')

@section('title', $UserData->username . ' Settings')
@section('content')

<!-- Flash Messages -->

<!-- Flash Messages -->
<div class="container-fluid">
    <h2 id="page-header">Settings</h2>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

                    <div class="panel-body">


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">General Settings</a></li>
        <li><a data-toggle="tab" href="#sectionC">General</a></li>
    </ul>

    <div class="tab-content">

        <div id="sectionA" class="tab-pane fade in active">
                        @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
            <div id="position-section">
                {!! Form::open(['method' => 'PATCH', 'action' => ['SettingsController@update', $UserData->username], 'class'=> 'form-horizontal']) !!}
                <div id="div-space-me">
                    <h4 id="settings-page-header-child">Email Address</h4>
                        {!! Form::email('email', Auth::user()->email, ['class' => 'form-control', 'placeholder'=> 'Email address'])!!}
                </div>

                <div id="div-space-me">
                    <h4 id="settings-page-header-child">Username</h4>
                         {!! Form::text('username', Auth::user()->username, ['class' => 'form-control', 'placeholder'=> 'Username'])!!}
                </div>
                <div id="div-space-me">
                     <h4 id="settings-page-header-child">Change Password</h4>
                        <div class="input-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder'=> 'New Password', 'autocomplete'=>'off'])!!}
                        </div>
                     <div class="input-group" id="input-negetive">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=> 'Confirm Password', 'autocomplete'=>'off'])!!}
                        </div>
                </div>
                <div id="div-space-me">
                     <h4 id="settings-page-header-child">Confirm Changes</h4>
                     {!! Form::password('password_old', ['class' => 'form-control', 'placeholder'=> 'Current Password']) !!}
                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div id="sectionC" class="tab-pane fade">
            <div id="position-section">
                <div id="div-space-me">
                    <h4 id="settings-page-header-child">Upload Profile Photo</h4>
                    {!! Form::open(['method'=> 'POST', 'action' => ['UserController@dp', $UserData->username], 'class'=>'form-horizontal' ]) !!}
                        {!! Form::file('dp') !!}
                </div>
                {!! Form::submit('Upload Image', ['class' => 'btn btn-success'])!!}
                {!! Form::close() !!}

                <div id="div-space-me">
                    {{-- NEW CONTENT FOR USERS TO UPLOAD OR UPDATE THEIR PROFILE --}}
                </div>

            </div>
        </div>

    </div>


                    </div>
                </div>
            </div>

</div>
@endsection

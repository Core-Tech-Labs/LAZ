@extends('auth/auth')
@section('title', 'Register')
@section('auth-content')
<div class="container-fluid" id="pullup">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
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

              {!! Form::open(['class' => 'form-horizontal']) !!}
              {!! Form::token() !!}
              <p id="auth-info">Tell us more about you.</p>
                <div class="special-cara">

                  <div class="form-group">
                    <label class="col-md-4 control-label">Date of Birth</label>
                        <div class="col-md-6">
                            {!! Form::input('date', '_dob', null , ['class'=> 'form-control', 'placeholder' => 'MM/DD/YYYY'])  !!}
                        </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Zip Code</label>
                        <div class="col-md-6">
                            {!! Form::text('zip', null, ['class'=> 'form-control', 'placeholder' => '00000'])  !!}
                        </div>
                   </div>
                  </div>
                                                <!-- Special Grouping -->

        <p id="auth-info">Select A Username you will remember</p>
          <div class="special-cara">
            <div class="form-group">

              <label class="col-md-4 control-label">Username</label>
              <div class="col-md-6">
                 {!! Form::text('username', null, ['class'=> 'form-control', 'placeholder'=> 'user_name']) !!}
              </div>
            </div>
          </div>
                                                <!-- Special Grouping -->

        <p id="auth-info">Help Us Secure your Account</p>
          <div class="special-cara">
            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                 {!! Form::email('email', null, ['class'=> 'form-control', 'placeholder'=> 'name@emailgroup.com']) !!}
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                  {!! Form::password('password', ['class'=> 'form-control', 'placeholder'=> 'P@ssword!1']) !!}
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                  {!! Form::password('password_confirmation', ['class'=> 'form-control', 'placeholder'=> 'P@ssword!1']) !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  {!! Form::submit('Register', ['class'=> 'btn btn-primary']) !!}
              </div>
            </div>
          </div>
                                                <!-- Special Grouping -->

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

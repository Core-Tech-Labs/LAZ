@extends('master')

@section('title', 'Messages')
@section('content')

<div class="container-fluid padding-top padding">
    <div class="panel panel-default">
      <div class="row">
        <div class="col-md-4" id="padding">
          <a href="{{ url('#') }}">
            <div class="media" id="message-comestics" style="background:#eee;">
              <div class="media-left">
                  <img class="media-object img-circle" id="user-dp" src="{{ asset('/imgs/default-dp.jpg') }}" alt="...">
              </div>
              <div class="media-body">
                <h4 class="media-heading">Users Name</h4>
                ...
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-8" id="padding">
          <div class="panel panel-default" id="msg-padding">
            <div class="well well-sm">...</div>
          </div>
            {!! Form::open(['method'=>'POST', 'action'=>['MessageController@store'], 'class'=>'form-horizontal' ]) !!}
                {!! Form::textarea('update', null, ['class'=>'form-control update-form', 'placeholder'=>'...']) !!}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection

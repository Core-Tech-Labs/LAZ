@extends('master')

@section('title', Auth::user()->username .' Dashboard')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-6"> <!-- Left Side -->
      @include('user.pieces.newsFeed.homePost')
      @include('user.pieces.newsFeed.homeFeed')
    </div>
    <div class="col-md-4"> <!-- Right Side -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Online Favs Users</h3>
        </div>
        <div class="panel-body">
        @if($online->toArray())
          @foreach ($online as $active)
            <div class="col-md-4 dh">
            <a href="{{ action('UserController@index', $active->user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
              <img src="{{ $active->user->userData->profile_picture }}" alt="{{$active->user->username}} Profile Image" title="{{$active->user->username}}" />
            </a>
              <a href="{{ action('UserController@index', $active->user->username) }}">{{ $active->user->username }}</a>
            </div>
          @endforeach
        @else
            No Users are online.
        @endif
        </div>
      </div>
      <!-- End -->
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Related Users</h3>
          </div>
          <div class="panel-body">
          @foreach ($users as $user)
            <div class="col-md-4 dh">
            <a href="{{ action('UserController@index', $user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
              <img src="{{ $user->userData->profile_picture }}" alt="{{$user->username}} Profile Image" title="{{$user->username}}" />
            </a>
              <a href="{{ action('UserController@index', $user->username) }}">{{ $user->username }}</a>
            </div>
          @endforeach
          </div>
        </div>
    </div>
  </div>

</div>

@endsection
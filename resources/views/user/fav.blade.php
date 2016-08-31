@extends('master')

@section('title', 'Favorites')
@section('content')

<div class="container-fluid padding-top padding">

    <div class="favBase"><ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#sectionFavs"><span class="badge">{{ count($favList) }}</span> Favs</a></li>
        <li><a data-toggle="tab" href="#sectionFaved"><span class="badge">{{ count($favedList) }}</span> Faved</a></li>
    </ul></div>

    <div class="tab-content">
      <div id="sectionFavs" class="tab-pane fade in active">
          @if(!$fav->isEmpty())
            @foreach ($fav as $user)
              <div class="col-md-4 dh">
              <a href="{{ action('UserController@index', $user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
                <img src="{{ $user->userData->profile_picture }}" alt="{{$user->username}} Profile Image" title="{{$user->username}}" />
              </a>
                <a href="{{ action('UserController@index', $user->username ) }}">{{ $user->username }}</a>
              </div>
            @endforeach
          @else
            <div class="favDis">
              <h4>You Faved No one</h4>
            </div>
          @endif
      </div>

      <div id="sectionFaved" class="tab-pane fade">
        @if(!$faved->isEmpty())
          @foreach ($faved as $user)
            <div class="col-md-4 dh">
            <a href="{{ action('UserController@index', $user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
              <img src="{{ $user->userData->profile_picture }}" alt="{{$user->username}} Profile Image" title="{{$user->username}}" />
            </a>
              <a href="{{ action('UserController@index', $user->username ) }}">{{ $user->username }}</a>
            </div>
          @endforeach
        @else
          <div class="favDis">
            <h4>No one Followed you</h4>
          </div>
        @endif
      </div>
    </div>

  </div>
  {{-- <div id="laz-paginate">{!! $users->render() !!}</div> --}}
@endsection

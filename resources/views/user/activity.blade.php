@extends('master')

@section('title', $UserData->username . ' Activity')
@section('content')
  <div class="container-fluid padding-top padding">
      <div class="row">
      @if($UserNewsFeed)
        @foreach($UserNewsFeed as $newsFeed )
        <div class="col-md-4 dh" id="padding">
          <div class="panel panel-default" id="BaseMessages">
            <div class="panel-body">
        @if($UserData->username === Auth::user()->username)
        @include('user.pieces.modal.FeedPostModal')
        <div class="btn-group" role="group" id="newsFeedSettings">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>

        </button>
            <ul class="dropdown-menu">
            <li>
                <a href="#" id="deletepost">Delete Post</a>
            </li>
            <li>
                <a href="#" id="editpost">Edit Post</a>
            </li>
            </ul>
        </div>
        @endif
        <div class="media">
            <div class="media-left">
                <img class="media-object img-circle" id="user-dp" src="{{$UserData->userData->profile_picture}}" />
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                @if( isset( json_decode($newsFeed, true)['UserNameBeingUpdated'] ) )
                    <a href=""> {{ json_decode($newsFeed, true)['UserPosting'] }}</a> &rarr; <a href="">{{ json_decode($newsFeed, true)['UserNameBeingUpdated'] }}</a>
                @else
                    <a href="">
                        {{ json_decode($newsFeed, true)['UserPosting'] }}
                    </a>
                @endif
                </h4>
                <span id="timestamp" timestamp="{{ json_decode($newsFeed, true)['created_at'] }}">
                <script  type="text/javascript">
                  var timestamp = document.getElementById('timestamp').getAttribute('timestamp');
                  var m = moment(timestamp);
                   document.write(m);
                    </script>
                </span>
            </div>
          </div>
            <div class="newsFeedContent">{{ json_decode($newsFeed, true)['BaseComment']}}</div>
            </div>
          </div>
        </div>
      @endforeach

      @else
          <div class="favDis">
            <h4>{{$UserData->username}} doesn't have any activity to present</h4>
          </div>
      @endif
      </div>
  </div>
@endsection

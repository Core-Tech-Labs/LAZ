@if (Auth::user()->username !== $UserData->username  )

    @if (!$UserData->checkFavorited() )
    <!-- Checks if Auth user is favorited -->
    <div class="btn-group">
      {!! Form::open(['action'=>'FavController@store']) !!}
      {!! Form::hidden('userIDToFav', $UserData->id) !!}
      {!! Form::hidden('userFaved', $UserData->username) !!}


        <button type="submit" class="btn btn-success">Add Fav</button>
      {!! Form::close() !!}
    @else
    <!-- Focus and unfavorite user-->
    {!! Form::open(['method' => 'DELETE', 'action' => ['FavController@destroy', $UserData->id] ]) !!}
      {!! Form::hidden('userIDToUnFav', $UserData->id) !!}
      {!! Form::hidden('userNmToFav', $UserData->username) !!}
      <div class="btn-group">
        <button type="submit" class="btn btn-primary FavLabel" data-placement="top" data-toggle="tooltip" title="UnFav {{$UserData->username}}"><span>Favorited</span></button>

        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
        </button>
      <ul class="dropdown-menu">
        <li><a href="{{ action('ActivityController@show', $UserData->username) }}">View {{ $UserData->username }}'s Activity Feed</a></li>
      </ul>
    </div>
    {!! Form::close() !!}
    @endif
        <button id="msg" type="button" class="btn btn-default">Message</button>
  </div>


  @else
    <a href="{{ action('ActivityController@show', $UserData->username) }}" class="btn btn-default">View My Activity</a>
@endif

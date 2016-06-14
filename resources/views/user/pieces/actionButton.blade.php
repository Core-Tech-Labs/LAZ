@if (Auth::user()->username !== $UserData->username  )

    @if (!$UserData->checkFavorited() )
    <!-- Checks if Auth user is favorited -->
    <div class="btn-group">
      {!! Form::open(['action'=>'FavController@store']) !!}
      {!! Form::hidden('userIDToFav', $UserData->id) !!}

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
        <li><a href="#">View {{ $UserData->username }}'s Activity</a></li>
      </ul>
    </div>
    {!! Form::close() !!}
    @endif
        <button type="button" class="btn btn-default">Message</button>
  </div>


  @else
    <a type="" class="btn btn-default">View My Activity</a>
@endif

<!--
  {{-- UNUSED CODE --}}

   {{-- <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button> --}}
    {{-- <ul class="dropdown-menu">
      <li><a href="#">--</a></li>
      <li><a href="#">--</a></li>
      <li><a href="#">-</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="#">Separated link</a></li>
    </ul>-->
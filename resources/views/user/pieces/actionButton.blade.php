@if (Auth::user()->username !== $UserData->username  )
  {{-- @if ($UserData->isFavedBy() ) --}}
  <!-- User Not Favorited form -->
  {!! Form::open(['action'=>'FavController@store']) !!}
    {!! Form::hidden('userIDToFav', $UserData->id) !!}
  <div class="btn-group">
      <button type="submit" class="btn btn-default">Add Fav</button>
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
    </ul> --}}

  {!! Form::close() !!}
  {{-- @else --}}
    <!-- User Favorited form
    <div>You are following {{ $UserData->username }}</div> -->
  {{-- @endif --}}
<button type="button" class="btn btn-default">Message</button>
</div>
  @else
    <a type="" class="btn btn-default">View My Activity</a>
  @endif
@include('head')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8"> <!-- Left Side -->
    <div class="panel panel-default">
      <div class="panel-body">
        <h1>News Feeed To come here</h1>
      </div>
      </div>
    </div>
    <div class="col-md-4"> <!-- Right Side -->
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Related Users</h3>
          </div>
          <div class="panel-body">
          @foreach ($users as $user)
            <div class="col-md-4 dh">
            <a href="{{ action('UserController@index', $user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
              <img src="{{ asset('/imgs/default-dp.jpg') }}" alt="{{$user->username}} Profile Image" title="{{$user->username}}" />
            </a>
              <a href="{{ action('UserController@index', $user->username) }}">{{ $user->username }}</a>
            </div>
          @endforeach
          </div>
        </div>
        <!-- End -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Online Favs Users</h3>
        </div>
        <div class="panel-body">
          My Code to be inputted here
        </div>
      </div>
    </div>
  </div>

</div>



@include("footer")
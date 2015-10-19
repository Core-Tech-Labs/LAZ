@include('head')
  <div class="container-fluid padding-top padding">

          @foreach ($users as $user)
            <div class="col-md-4 dh">
            <a href="{{ action('UserController@index', $user->username ) }}" class="thumbnail" style="margin-bottom:0px !important">
              <img src="{{ asset('/imgs/default-dp.jpg') }}" alt="{{$user->username}} Profile Image" title="{{$user->username}}" />
            </a>
              <a href="{{ action('UserController@index', $user->username ) }}">{{ $user->username }}</a>
            </div>

          @endforeach
  </div>
  <div id="laz-paginate">{!! $users->render() !!}</div>

@include('footer')
@if(Redis::lrange('timeline:'.Auth::user()->id, 0, -1) == true)
  @foreach($UserNewsFeed as $newsFeed)
    <div class="panel panel-default" id="BaseMessages">
        <div class="panel-body">
            <div class="btn-group" role="group" id="newsFeedSettings">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
            </button>
                <ul class="dropdown-menu">
                  <li>
                    <a href="">Delete Post</a>
                  </li>
                  <li>
                    <a href="{{action('FeedsController@update', Auth::user()->username )}}">Edit Post</a>
                  </li>
                </ul>
            </div>
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle" id="user-dp" src="{{ json_decode($newsFeed, true)['UserPostingImg'] }}" />
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                    @if( isset( json_decode($newsFeed, true)['UserNameBeingUpdated'] ) )
                        <a href="{{url('/')}}/_{{ json_decode($newsFeed, true)['UserPosting'] }}"> {{ json_decode($newsFeed, true)['UserPosting'] }}</a> &rarr; <a href="{{url('/')}}/_{{ json_decode($newsFeed, true)['UserNameBeingUpdated'] }}">{{ json_decode($newsFeed, true)['UserNameBeingUpdated'] }}</a>
                    @else
                        <a href="{{url('/')}}/_{{ json_decode($newsFeed, true)['UserPosting'] }}">
                            {{ json_decode($newsFeed, true)['UserPosting'] }}
                        </a>
                    @endif
                    </h4>
                    <span id="timestamp" timestamp="{{ json_decode($newsFeed, true)['created_at'] }}">
                      <script  type="text/javascript">
                        var timestamp = document.getElementById('timestamp').getAttribute('timestamp');
                        var m = $.timeago(timestamp);
                         document.write(m);
                      </script>
                    </span>
                </div>
            </div>
            <div class="newsFeedContent">{{ json_decode($newsFeed, true)['BaseComment']}}</div>
        </div>
    </div>
  @endforeach
@else
  <div class="panel panel-default">
        <div class="panel-body">
            <div class="">Your Updates and Users you follow updates will populate here. Post an update or start Favoriting Other Users</div>
        </div>
  </div>
@endif
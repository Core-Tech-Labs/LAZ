@if(Redis::smembers($UserData->username))
    @foreach(Redis::smembers($UserData->username) as $newsFeed )
    <div class="panel panel-default" id="BaseMessages">
        <div class="panel-body">
            @if($UserData->username === Auth::user()->username)
            <div class="btn-group" role="group" id="newsFeedSettings">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
            </button>
                <ul class="dropdown-menu">
                <li><a href="{{action('FeedsController@destroy', $UserData->username )}}">Delete Post</a></li>
                <li><a href="{{action('FeedsController@update', $UserData->username )}}">Edit Post</a></li>
                </ul>
            </div>
            @endif
            <div class="media">
                <div class="media-left">
                    <img class="media-object img-circle" id="user-dp" src="{{$UserData->userData->profile_picture}}" />
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="">{{ json_decode($newsFeed, true)['UserPosting'] }}</a></h4>
                    <span id="timestamp" timestamp="{{ json_decode($newsFeed, true)['created_at'] }}">
                    {{ json_decode($newsFeed, true)['created_at'] }}
                    <!-- <script  type="text/javascript">
                      var timestamp = document.getElementById('timestamp').getAttribute('timestamp');
                      var m = moment(timestamp);
                       document.write(m);
                        </script> -->
                    </span>
                </div>
            </div>
            <div class="newsFeedContent">{{json_decode($newsFeed, true)['BaseComment']}}</div>
        </div>
    </div>
    @endforeach
@else
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="">{{ $UserData->username }} hasn't posted any updates</div>
        </div>
    </div>
@endif

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.6/socket.io.min.js"></script>
<script type="text/javascript">
    var socket = io('http://192.168.20.20:3000');

    socket.on('update-feed:App\\Events\\FeedPosted', function(data){
        console.log(data);
    });
</script>
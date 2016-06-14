@include('head')
@section('title', $UserData->username . ' Profile')
    <div class="laz laz-profile">
        <div class="container padding">
            <div class="laz-profile-user">

            @if( Auth::user()->id === $UserData->id )
                <a href="#" data-placement="bottom" data-toggle="tooltip" title="Click to upload your Picture" id="profile-photo">
                    <div class="profile-photo">
                        <img src="{!! Auth::user()->userData->profile_picture!!}"/>
                    </div>
                </a>
            @else
                <div class="profile-photo">
                    <img src="{!! $UserData->userData->profile_picture!!}"/>
                </div>
            @endif

                <h1 class="laz-profile-name" id="user-name" username="{{ $UserData->username }}">{{ $UserData->username }}
                    @if ( in_array($UserData->id, $online) )
                        <div class="laz-profile-userOnline">Online</div>
                    @else
                        <div class="laz-profile-userOffline">Offline</div>
                    @endif
                </h1>
            </div>
        </div>
            <div class="user-action-buttons">
                @include('user.pieces.actionButton')
            </div>
    </div><!-- Start of Timeline -->
<div class="container-fluid padding-top">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users Information</h3>
                    @if ($UserData->username === Auth::user()->username  )
                        <button id="edit" type="button" class="btn btn-default btn-xs panel-button">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                    @endif
                </div>
                    <div class="panel-body">
                        <div id="laz-usr-base">
                            <p>Zip Code: <em id="right-base">{{ $UserData->userData->zip }}</em></p>

                        </div>
                        <!-- You can add anything you want within -->

                    </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">My Images</h3>
                    @if ($UserData->username === Auth::user()->username  )
                        <button id="userImage" type="button" data-placement="right" data-toggle="tooltip" title="Upload Your Images" class="btn btn-default btn-xs panel-button">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                    @endif
                </div>
                    <div class="panel-body">
                    @if (empty($UserData->usersPhotos->toArray() ))
                                <p>No Uploaded Images</p>
                          @else
                            @foreach ( $photos as $photo )
                                <div class="col-md-4 massImages">
                                    <img id="preview-image" src="{{ url() }}{{ $photo->image_path }}" alt="{{ $photo->image_name }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
            </div>
        </div>


        <div class="col-md-6">
            @include('user.pieces.newsFeed.post')
            @include('user.pieces.newsFeed.feeds')
        </div>


        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Xtra Content</p>
                    <!-- You can add anything you want within -->
                </div>
            </div>
        </div>

    </div>
</div>

@include('user.pieces.modal.userModal')
@include('user.pieces.modal.profilePicModal')

<script type="text/javascript">
            //Editing about me button
$(document).ready(function(){
    $("#userImage").click(function(){
        $("#myModalone").modal('show');
    });
});

$(document).ready(function(){
    $("#profile-photo").click(function(){
        $("#profile-photo-modal").modal('show');
    });
});

</script>


@include('footer')


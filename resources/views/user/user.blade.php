@include('head')
@section('title', $UserData->username . ' Profile')
    <div class="laz laz-profile">
        <div class="container padding">
            <div class="laz-profile-user">
                <div id="content" data-placement="bottom" data-toggle="tooltip" title="Change Your Picture"></div>
                <h1 class="laz-profile-name" id="user-name" username="{{ $UserData->username }}">{{ $UserData->username }}
                    @if ( $activeuser === $UserData->id  )
                        <div class="laz-profile-userOnline">Online</div>

                    @else
                        <div class="laz-profile-userOffline">Offline</div>
                    @endif
                </h1>
            </div>
        </div>
        <script src="{{ asset('js/bundle.js') }}"></script>
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
                        <p>Xtra Content</p>
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
                        <!-- You can add anything you want within -->
                          {{--  @foreach ($UserData->usersImages->chunk(3) as $photo) --}}
                          @if ($UserData->usersPhotos == false )
                            <p>You haven't Uploaded any Images</p>
                          @else
                            @foreach ($UserData->usersPhotos as $photo)
                                <div class="col-md-4">
                                    <img id="preview-image" src="{{ url() }}{{ $photo->image_path }}" alt="{{ $photo->image_name }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
            </div>
        </div>

            {{-- React Hook --}}
            <div id="FeedInput"></div>
            {!! Form::token() !!}
            <!-- script src="{{ asset('js/feedbundle.js') }}"></script>
            {{-- React Hook --}}

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

<script type="text/javascript">
            //Editing about me button
$(document).ready(function(){
    $("#userImage").click(function(){
        $("#myModalone").modal('show');
    });
});

</script>


@include('footer')


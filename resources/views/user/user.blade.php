@include('head')
<script type="text/javascript">
// Test Script
$(document).ready(function(){
    //Default
    // $(':button').hide();
    //Default once shown HACK
    // $(':botton').on("mouseenter", function(event){
    //     $(':button').show();
    // });
    // Appear
//     $('.panel-title').on("mouseenter", function( event ){
//        $(':button').show();
//     });
//        // Disappear
//     $('.panel-title').on("mouseleave", function(event){
//         $(':button').hide();
//     });
// });
</script>

    <div class="laz laz-profile">
        <div class="container padding">
            <div class="laz-profile-user">
                <div id="content"></div>
                <script src="{{ asset('js/bundle.js') }}"></script>
                <h1 class="laz-profile-name">{{ Auth::user()->username }}</h1>

            </div>
        </div>
                    <!-- Extra Content within the user header -->
    </div><!-- Start of Timeline -->
<div class="container-fluid padding-top">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users Information</h3>
                    <button id="edit" type="button" class="btn btn-default btn-xs panel-button">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                </div>
                    <div class="panel-body">
                        <p>Xtra Content</p>
                        <!-- You can add anything you want within -->

                    </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">My Images</h3>
                    <button id="userImage" type="button" class="btn btn-default btn-xs panel-button">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                </div>
                    <div class="panel-body">
                        <p>Xtra Content</p>
                        <!-- You can add anything you want within -->
                          {{--  @foreach ($UserData->usersImages->chunk(3) as $photo) --}}
                            @foreach ($UserData->usersImages as $photo)
                                <img src="{{ url() }}/{{ $photo->image_thumbnail }}" alt="{{ $photo->image_name }}" >
                            @endforeach
                    </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'UserController@store', 'class'=>'form-horizontal' ]) !!}
                        {!! Form::textarea('update', null, ['class'=>'form-control update-form', 'placeholder'=>'Tell us what you been up to...']) !!}
                    {!! Form::close() !!}
                    <br/>
                </div>
            <br/>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- What this content is going to look like
                    {{--


                    --}}
                     -->
                </div>
            </div>
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

<!-- For About Me-->

<div id="myModalone" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Upload your images</h4>
                </div>
                <div class="modal-body">
                    {{--   <!-- Dropzone Holder --> --}}
                {!! Form::open(['method'=>'POST', 'files'=>'true', 'action'=> ['UserController@upload', $UserData->username], 'class'=>'dropzone', 'id'=>'massUpload']) !!}

                {{--{!! Form::close() !!}--}}
                    {{--   <!-- Dropzone Holder --> --}}
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
<!-- For About Me-->

<script type="text/javascript">
            //Editing about me button
$(document).ready(function(){
    $("#userImage").click(function(){
        $("#myModalone").modal('show');
    });
});

</script>


@include('footer')


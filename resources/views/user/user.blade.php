@include('head')
<script type="text/javascript">
// Test Script
</script>
    <div class="laz laz-profile">
        <div class="container padding">
            <div class="laz-profile-user">
                <img src="{{ asset('/imgs/default-dp.jpg') }}" class="img-circle" id="home-dp"/>
                    <div class="profile-img-upload"><!-- Upload button // Hidden once hovered -->
                            {!! Form::open(['methon'=>'PUT', 'action'=>['UserController@store', Auth::user()->id], 'id'=>'move-tip' ]) !!}
                        <span class="file-input btn btn-primary btn-file">
                                Upload Image {!! Form::file('profile_img',null, ['class'=>'btn btn-default']) !!}
                        </span>
                            {!! Form::close() !!}
                    </div>
                <h1 class="laz-profile-name">{{ Auth::user()->username }}</h1>
            </div>
        </div>
                    <!-- Extra Content within the user header -->
    </div><!-- Start of Timeline -->
<div class="container-fluid padding-top">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Xtra Content</p>
                    <!-- You can add anything you want within -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>['UserController@store'], 'class'=>'form-horizontal' ]) !!}
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




@include('footer')


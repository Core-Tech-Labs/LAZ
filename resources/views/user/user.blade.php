@include('head')
<script type="text/javascript">
    /**
    *   For upload button on user Profile
    *   (Needs to move to custom.js)
    */

    $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
</script>
    <div class="laz laz-profile">
            <div class="container">

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


                <p class="laz-profile-location">
                {{ $zip }}
                </p>


            </div>



            </div>
    </div>




@include('footer')


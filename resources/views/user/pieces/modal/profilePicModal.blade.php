@if ($UserData->username === Auth::user()->username  )
  <div id="profile-photo-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Upload your Profile Picture</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      {!! Form::open(['method'=>'POST', 'files'=>'true', 'action'=> ['UserController@dp', $UserData->username], 'class'=>'dropzone', 'id'=>'profileUpload']) !!}
                    </div>
                    <div class="col-md-6">
                      <div class="profile-photo">
                        <img src="{!!Auth::user()->userData->profile_picture!!}"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif

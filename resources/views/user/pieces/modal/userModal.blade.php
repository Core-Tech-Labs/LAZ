@if ($UserData->username === Auth::user()->username  )
    {{-- Image Upload Modal --}}
    <div id="myModalone" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Upload your images</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'files'=>'true', 'action'=> ['UserController@upload', $UserData->username], 'class'=>'dropzone', 'id'=>'massUpload']) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- Users Information Modal --}}
      <div id="edit_info_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update your information</h4>
                </div>
                <div class="modal-body">
                {!! Form::model(['method'=>'PATCH', 'action'=> ['SettingsController@update', $UserData->username], 'class'=>'form-horizontal']) !!}
                    <p> Zip Code: <em id="right-base"> {!! Form::text('zip', null, ['class'=>'form-control', 'placeholder'=> $UserData->userData->zip]) !!}</em></p>
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

<div id="userMessaging" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Message to {{ $UserData->username }}</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>['MessageController@send', $UserData->username], 'class'=>'msg'])!!}
                {!! Form::hidden('UserConsumers', $UserData->username) !!}
                {!! Form::textarea('message-body', null, ['class' => 'form-control', 'placeholder' => '...' ]) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Send Message', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>

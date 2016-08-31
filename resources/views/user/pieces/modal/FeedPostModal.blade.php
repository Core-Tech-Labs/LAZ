<div id="delPost" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Deleting {{ $UserData->username }} Post</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['FeedsController@destroy', Auth::user()->username] ]) !!}
                {{-- {!! Form::hidden('BaseComment', json_decode($newsFeed, true)['BaseComment'])!!} --}}
                <p>Do you really want to delete {{-- json_decode($newsFeed, true)['BaseComment'] --}}</p>
                </div>
                <div class="modal-footer">
                    {{-- {!! Form::button('Quit', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!} --}}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>

{{-- editPost --}}
<div id="editPost" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation of Deleting Post</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['FeedsController@destroy', Auth::user()->username] ]) !!}
                <p>Do you really want to delete</p>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>
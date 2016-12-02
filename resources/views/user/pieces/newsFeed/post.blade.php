<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open(['method'=>'POST', 'action'=>'FeedsController@store', 'class'=>'form-horizontal', 'id'=>'prevent'])!!}
        {!! Form::hidden('created_at', Carbon\Carbon::now() ) !!}
        @if(Auth::user()->username !== $UserData->username )
            {!! Form::hidden('UserBeingUpdatedID', $UserData->id) !!}
            {!! Form::hidden('UserNameBeingUpdated', $UserData->username) !!}
            {{-- {!! Form::hidden('UserBeingPostedImg', $UserData->userData->profile_picture) !!} --}}
        @endif
            {!! Form::hidden('UserPosting', Auth::user()->username) !!}
            {!! Form::hidden('UserPostingID', Auth::user()->id) !!}
            {!! Form::hidden('UserPostingImg', Auth::user()->userData->profile_picture) !!}


            {!! Form::textarea('BaseComment', null, ['class'=>'form-control update-form', 'placeholder'=>'Tell us what you been up to...', 'size'=>'50x10'])!!}

            {!! Form::submit('Post', ['class'=>'btn btn-success', 'id'=>'newsFeedSettings', 'style'=>'margin:10px 0'])!!}
        {!! Form::close()!!}
    </div>
</div>
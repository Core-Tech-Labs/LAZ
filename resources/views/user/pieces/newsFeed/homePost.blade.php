<div class="panel panel-default">
    <div class="panel-body">
        {!! Form::open(['method'=>'POST', 'action'=>'FeedsController@store', 'class'=>'form-horizontal', 'id'=>'prevent'])!!}
        {!! Form::hidden('created_at', Carbon\Carbon::now() ) !!}
            {!! Form::hidden('UserPosting', Auth::user()->username) !!}
            {!! Form::hidden('UserPostingID', Auth::user()->id) !!}

            {!! Form::textarea('BaseComment', null, ['class'=>'form-control update-form', 'placeholder'=>'Tell us what you been up to...', 'size'=>'50x10'])!!}

            {!! Form::submit('Post', ['class'=>'btn btn-success', 'id'=>'newsFeedSettings', 'style'=>'margin:10px 0'])!!}
        {!! Form::close()!!}
    </div>
</div>
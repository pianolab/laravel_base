@section('javascripts')
    {{ HTML::script('javascripts/modules/comments.js') }}
@stop

@section('content')
<div id="new-attachments" class="row form-group">
    @include('attachments.member', [ 'attachment' => $attachment ])

    <div class="col-lg-9 col-md-8 col-xs-6">
        <div class="row">
            <div class="col-md-12">
                {{ Form::model($comment, [ 'id' => 'form-comment', 'url' => 'comments' ]) }}
                    {{ Form::hidden('parent_id', $attachment->id) }}
                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::label('content', _t('comment')) }}
                            {{ Form::textarea('content', null, [ 'class' => 'form-control', 'rows' => 5, 'placeholder' => _t('type your comment...') ]) }}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            {{ Form::submit(t('submit_new', [ 'model' => _t('comment') ]), [ 'class' => 'btn btn-primary' ]) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @foreach ($attachment->comments as $key => $comment)
                    <p><b>{{ $comment->user->username }} </b>
                    <small><i>{{ $comment->created_at->diffForHumans() }}</i></small><br />
                    {{ nl2br($comment->content) }} <hr /> </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop

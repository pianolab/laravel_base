@section('javascripts')
    {{ HTML::script('javascripts/modules/comments.js') }}
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>{{ _t('attachments') }} <small>{{ t('view') }}</small></h3>
    </div>
    <div class="col-md-4 text-right"> <br>
        <a href="{{ url('admin/attachments') }}" class="btn btn-info">
            <i class="fa fa-arrow-left"></i> {{ t('see all') }}
        </a>
    </div>
</div>

<hr />

<div id="new-attachments" class="row form-group">
    <div class="uploadifive onshow" data-parent-id="{{ $attachment->parent_id }}" data-parent-name="{{ $attachment->parent_name }}"></div>
    @include('admin.attachments.member', [ 'attachment' => $attachment ])

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
                            {{ link_to('/admin/' . str_plural($attachment->parent_name) . '/' . $attachment->parent_id . '/edit', t('back')) }}
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

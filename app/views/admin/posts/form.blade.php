@section('javascripts')
    {{ HTML::script('javascripts/modules/posts.js') }}
@stop
{{ Form::model($post, $form_attributes) }}
    <div class="row form-group">
        <div class="col-md-8">
            {{ Form::label('title', t('Title')) }}
            {{ Form::text('title', null, [ 'class' => 'form-control' ]) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('published_at', t('Published at')) }}
            {{ Form::text('published_at', null, [ 'class' => 'form-control datepicker', 'alt' => 'date-us' ]) }}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12 markdown-editor">
            {{ Form::label('content', t('Content')) }}
            {{ Form::textarea('content', null, [ 'class' => 'form-control' ]) }}
        </div>
    </div>

    @if ($post->id)
        <div class="row form-group">
            <div class="col-md-12">
                <label>{{ t('Files') }}</label>
            </div>
        </div>
        <div id="wrap-uploadifive" class="row form-group">
            <div class="col-md-12">
                <div id="attachment_post" data-multi="false" data-parent-id="{{ $post->id }}" data-parent-name="posts" class="uploadifive">{{ t('Selecione o arquivo...') }}</div>
            </div>
        </div>
        <div id="new-attachments" class="row form-group">
            @if ($post->images)
            @foreach ($post->images as $key => $attachment)
                @include('attachments.member', [ 'attachment' => $attachment ])
            @endforeach
            @endif
        </div>
    @endif

    <div class="row form-group">
        <div class="col-md-12">
            {{ Form::submit($submit_label, [ 'class' => 'btn btn-primary' ]) }}
            {{ link_to_route('admin.posts.index', t('back')) }}
        </div>
    </div>
{{ Form::close() }}

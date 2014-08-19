@section('javascripts')
    {{ HTML::script('javascripts/modules/posts.js') }}
@stop
{{ Form::model($post, $form_attributes) }}
    <div class="row form-group">
        <div class="col-md-8">
            {{ Form::label('title') }}
            {{ Form::text('title', null, [ 'class' => 'form-control' ]) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('published_at') }}
            {{ Form::text('published_at', null, [ 'class' => 'form-control datepicker', 'alt' => 'date-us' ]) }}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12 markdown-editor">
            {{ Form::label('content') }}
            {{ Form::textarea('content', null, [ 'class' => 'form-control' ]) }}
        </div>
    </div>

    @if ($post->id)
        <div class="row form-group">
            <div class="col-md-12">
                <label>{{ t('Arquivo') }}</label>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="wrap-uploadify">
                    <div id="attachment_post" data-parent-id="{{ $post->id }}" data-parent-name="post" class="uploadify">{{ t('Selecione o arquivo...') }}</div>
                </div>
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
            <a href="{{ url('posts') }}">{{ t('back') }}</a>
        </div>
    </div>
{{ Form::close() }}

@if ($post->images)
@foreach ($post->images as $key => $attachment)
    @include('attachments.modal', [ 'attachment' => $attachment ])
@endforeach
@endif

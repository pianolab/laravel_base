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
                <div class="col-md-3">
                    <p class="thumbnail">
                        <span class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-attachment-{{ $attachment->id }}">
                            <i class="fa fa-times"></i> {{ t('remove') }}
                        </span>
                        {{ HTML::image('upload/posts/' . $post->id . '/' . $attachment->file_name, null, [ 'style' => 'width:300px' ]) }}
                    </p>
                </div>
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
        <!-- Modal -->
        <div class="modal fade" id="delete-attachment-{{ $attachment->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title modal-title-delete">{{ t('Atention') }}!</h3>
                    </div>
                    <div class="modal-body">
                        {{ t('confirm_remove_image', [ 'image' => $attachment->origin_name ]) }}
                    </div>
                    <div class="modal-footer">
                        {{ Form::open([ 'route' => [ 'attachments.destroy', 'posts', $post->id, $attachment->id ], 'method' => 'delete' ]) }}
                            <button type="button" class="btn btn-default btn-modal-close" data-dismiss="modal">{{ t('cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ t('remove') }}</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif

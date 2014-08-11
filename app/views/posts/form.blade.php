{{ Form::model($post, $form_attributes) }}
    <div class="row form-group">
        <div class="col-md-8">
            {{ Form::label('title') }}
            {{ Form::text('title', null, [ 'class' => 'form-control' ]) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('published_at') }}
            {{ Form::text('published_at', null, [ 'class' => 'form-control' ]) }}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            {{ Form::label('content') }}
            {{ Form::textarea('content', null, [ 'class' => 'form-control' ]) }}
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            {{ Form::submit($submit_label, array('class' => 'btn btn-primary')) }}
            <a href="{{ url('posts') }}">back</a>
        </div>
    </div>
{{ Form::close() }}

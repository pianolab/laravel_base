@section('content')
    @if(!empty($attachment))
        <div class="col-md-12">
            <p>{{ HTML::image('upload/posts/' . $attachment->parent_id . '/' . $attachment->file_name, null, [ 'style' => 'width:300px' ]) }}</p>
        </div>
    @endif
@stop

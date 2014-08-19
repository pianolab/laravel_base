@section('content')
    @if(!empty($attachment))
        <div class="col-md-12">
            <p>{{ HTML::image('uploads/posts/' . $attachment->parent_id . '/' . $attachment->file_name, null, [ 'style' => 'width:300px' ]) }}</p>
        </div>
    @endif
@stop

@section('content')
    <h3>Posts <small>edit</small></h3>
    <hr />

    @include('posts.form', [ 'form_attributes' => [ 'route' => [ 'posts.update', $post->id ], 'method' => 'put' ], 'submit_label' => 'Update Post' ])
@stop

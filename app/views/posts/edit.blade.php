@section('content')
    <h3>{{ t('Posts') }} <small>{{ t('edit') }}</small></h3>
    <hr />

    @include('posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => [ 'posts.update', $post->id ], 'method' => 'put' ], 'submit_label' => 'Update Post' ])
@stop

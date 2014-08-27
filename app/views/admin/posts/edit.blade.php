@section('content')
    <h3>{{ _t('posts') }} <small>{{ t('edit') }}</small></h3>
    <hr />

    @include('admin.posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => [ 'admin.posts.update', $post->id ], 'method' => 'put' ], 'submit_label' => t('submit_update', [ 'model' => _t('post') ]) ])
@stop

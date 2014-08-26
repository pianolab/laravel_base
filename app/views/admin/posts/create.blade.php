@section('content')
    <h3>{{ t('Posts') }} <small>{{ t('new') }}</small></h3>
    <hr />

    @include('admin.posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => 'admin.posts.store' ], 'submit_label' => t('submit_new', [ 'model' => t('Post') ]) ])
@stop

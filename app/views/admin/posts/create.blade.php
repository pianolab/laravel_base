@section('content')
    <h3>{{ _t('posts') }} <small>{{ t('new') }}</small></h3>
    <hr />

    @include('admin.posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => 'admin.posts.store' ], 'submit_label' => t('submit_new', [ 'model' => _t('post') ]) ])
@stop

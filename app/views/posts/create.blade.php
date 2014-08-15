@section('content')
    <h3>{{ t('Posts') }} <small>{{ t('new') }}</small></h3>
    <hr />

    @include('posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => 'posts.store' ], 'submit_label' => 'Save Post' ])
@stop

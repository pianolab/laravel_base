@section('content')
    <h3>{{ _t('home') }} <small>{{ t('index') }}</small></h3>

    <h4>{{ t('Welcome to application') }}!</h4>
    <p>{{ link_to('/admin', t('Go to admin')) }}</p>
@stop

@section('content')
<div class='container'>
    {{ Form::open(array('url' => '/authenticate', 'class' => 'form-signin')) }}
        <h2 class='form-signin-heading'>{{ _t('authentication') }}</h2>

        {{ Form::text('username', Input::old('username'), array('placeholder' => _t('email'), 'class' => 'form-control')) }}

        {{ Form::password('password', array('placeholder' => _t('password'), 'class' => 'form-control')) }}

        {{ Form::submit(_t('sign in'), array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop

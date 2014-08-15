@section('content')
<div class='container'>
    {{ Form::open(array('url' => '/authenticate', 'class' => 'form-signin')) }}
        <h2 class='form-signin-heading'>{{ t('Autentication') }}</h2>

        {{ Form::text('username', Input::old('username'), array('placeholder' => t('E-mail'), 'class' => 'form-control')) }}

        {{ Form::password('password', array('placeholder' => t('Senha'), 'class' => 'form-control')) }}

        {{ Form::submit(t('Entrar'), array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop

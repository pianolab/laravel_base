@section('content')
<div class='container'>
    {{ Form::open(array('url' => '/authenticate', 'class' => 'form-signin')) }}
        <h2 class='form-signin-heading'>{{ t('Authentication') }}</h2>

        {{ Form::text('username', Input::old('username'), array('placeholder' => t('Email'), 'class' => 'form-control')) }}

        {{ Form::password('password', array('placeholder' => t('Password'), 'class' => 'form-control')) }}

        {{ Form::submit(t('Sign in'), array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop

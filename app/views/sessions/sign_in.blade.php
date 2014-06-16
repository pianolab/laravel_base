@section('content')
<div class='container'>
    {{ Form::open(array('url' => '/authenticate', 'class' => 'form-signin')) }}
        <h2 class='form-signin-heading'>Autenticação</h2>

        {{ Form::text('username', Input::old('username'), array('placeholder' => 'E-mail', 'class' => 'form-control')) }}

        {{ Form::password('password', array('placeholder' => 'Senha', 'class' => 'form-control')) }}

        {{ Form::submit('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')) }}

    {{ Form::close() }}
</div>
@stop
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-center')) }}
    <h1 class="form-signin-heading">Please Login</h1>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
 
    {{ Form::submit('Login', array('class'=>'button'))}}
{{ Form::close() }}

<a href="/password/remind" title="Remind Password">Remind Password</a>
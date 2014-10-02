{{ Form::open(array('url'=>'users/signin', 'class'=>'form-center')) }}
    <h1 class="form-signin-heading">Please Login</h1>
 
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
 
    {{ Form::submit('Login', array('class'=>'button'))}}
{{ Form::close() }}

<a href="/password/reset" title="Reset Password">Reset Password</a>
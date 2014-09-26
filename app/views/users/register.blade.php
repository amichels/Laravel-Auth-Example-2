{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">Please Register</h2>
 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    {{ Form::text('firstname', null, array('placeholder'=>'First Name')) }}
    {{ Form::text('lastname', null, array('placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }}
 
    {{ Form::submit('Register', array('class'=>'button'))}}
{{ Form::close() }}
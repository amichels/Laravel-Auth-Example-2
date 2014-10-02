<h1>Reset Password</h1>

{{ Form::open(array('route' => 'password.request')) }}
 
	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	{{ Form::submit('Submit', array('class'=>'button')) }}
 
{{ Form::close() }}
<h1>Reset Password</h1>

{{ Form::open(array('route' => array('password.update', $token))) }}
 
  {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
  {{ Form::text('password', null, array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
  {{ Form::text('password_confirmation', null, array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
  {{ Form::hidden('token', $token) }}
  {{ Form::submit('Submit', array('class'=>'button')) }}
 
{{ Form::close() }}
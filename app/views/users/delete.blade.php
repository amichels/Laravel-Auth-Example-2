<h1>Delete your Account</h1>
<p>Do you really want to delete your account?</p>

{{ Form::open(array('url' => 'users/user')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit('Delete your Account', array('class' => 'button')) }}
{{ Form::close() }}
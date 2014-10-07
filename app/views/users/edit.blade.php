{{ Form::model($user, ['role' => 'form', 'url' => '/users/update/' . Auth::user()->id, 'method' => 'POST']) }}

	<ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <h2 class="form-signup-heading">Edit</h2>
 
    {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
    {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    <!--{{ Form::password('password', array('placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }}-->
 
    {{ Form::submit('Update', array('class'=>'button'))}}
{{ Form::close() }}
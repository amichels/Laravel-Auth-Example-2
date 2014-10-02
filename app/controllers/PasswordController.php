<?php

class PasswordController extends BaseController {

	protected $layout = "layouts.main";
 
	public function remind(){
		$this->layout->content = View::make('password.remind');
	}

  	public function request(){
		$credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));
		// add email and token to reminders table
	  	Password::remind($credentials);
	  	return Redirect::to('users/login')->with('success', 'A password reset link was sent to your email.');
	}

	public function reset($token){
	  $this->layout->content = View::make('password.reset')->with('token', $token);
	}

	public function update(){
	  	$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response){
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('alert', "An Error has occured");

			case Password::PASSWORD_RESET:
				return Redirect::to('/users/login')->with('success', 'Your password was successfully changed.');
		}
	}

}
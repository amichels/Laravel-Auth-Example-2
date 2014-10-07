<?php

class RemindersController extends BaseController {

	protected $layout = "layouts.main";

	public function index(){
		$this->layout->content = View::make('password.remind');
	}

	public function store(){
		switch (Password::remind(Input::only('email'))){
	  		case Password::INVALID_USER:
	    		return Redirect::back()->with('alert', "Invalid User");

	  		case Password::REMINDER_SENT:
	    		return Redirect::back()->with('success', "Reminder Sent");
		}
	}

	public function show($token = null){
		if (is_null($token)) App::abort(404);

		$this->layout->content = View::make('password.reset')->with('token', $token);
	}

	public function update(){
		$credentials = Input::only(
	  		'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password){
		  $user->password = Hash::make($password);

		  $user->save();
		});

		switch ($response){
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
			return Redirect::back()->with('alert', Lang::get($response));

			case Password::PASSWORD_RESET:
		    return Redirect::to('/');
		}
	}
}
?>
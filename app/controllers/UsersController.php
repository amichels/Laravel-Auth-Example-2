<?php
 
class UsersController extends BaseController {

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getDashboard','getEdit')));
	}

    protected $layout = "layouts.main";

    public function getRegister() {
	    $this->layout->content = View::make('users.register');
	}

	public function postCreate() {
	    $simpleRules = Validator::make(Input::all(), User::$simpleRules);
	    $passwordRules = Validator::make(Input::all(), User::$passwordRules);
	 
	    if ($simpleRules->passes() and $passwordRules->passes()) {
	    	$user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('users/login')->with('success', 'Thanks for registering!');
	    } else {
	    	$validation = array_merge_recursive($simpleRules->messages()->toArray(), $passwordRules->messages()->toArray());
	    	return Redirect::to('users/register')->with('alert', 'The following errors occurred')->withErrors($validation)->withInput();
	    }
	}

	public function getEdit(){
		$id = Auth::user()->id;
		$user = User::find($id);
		$this->layout->content = View::make('users.edit')->with('user', $user);
	}

	public function postUpdate(){
		$id = Auth::user()->id;
		$simpleRules = Validator::make(Input::all(), User::$simpleRules);
		if ($simpleRules->passes()) {
		    $user = User::find($id);
		    $user->firstname = Input::get("firstname");
		    $user->lastname = Input::get("lastname");
		    $user->email = Input::get("email");
		    $user->save();
		    return Redirect::to('users/edit/')->with('success', 'Your account has been updated.');
	    } else {
	    	return Redirect::to('users/edit/')->with('alert', 'The following errors occurred')->withErrors($simpleRules)->withInput(); 
	    }
	}

	public function getLogin() {
	    $this->layout->content = View::make('users.login');
	}

	public function postSignin() {
    	if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('users/dashboard')->with('success', 'You are now logged in!');
		} else {
		    return Redirect::to('users/login')
		        ->with('alert', 'Your username/password combination was incorrect')
		        ->withInput();
		}      
	}

	public function getDashboard() {
		$id = Auth::id();
		$user = User::find($id);
    	$this->layout->content = View::make('users.dashboard')
			->with('user', $user);
	}

	public function getLogout() {
	    Auth::logout();
	    return Redirect::to('users/login')->with('success', 'Your are now logged out!');
	}
}
?>
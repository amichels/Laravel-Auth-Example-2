<?php
 
class UsersController extends BaseController {

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

    protected $layout = "layouts.main";

    public function getRegister() {
	    $this->layout->content = View::make('users.register');
	}

	public function postCreate() {
	    $validator = Validator::make(Input::all(), User::$rules);
	 
	    if ($validator->passes()) {
	    	$user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('users/login')->with('success', 'Thanks for registering!');
	    } else {
	    	return Redirect::to('users/register')->with('error', 'The following errors occurred')->withErrors($validator)->withInput();  
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
		        ->with('error', 'Your username/password combination was incorrect')
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
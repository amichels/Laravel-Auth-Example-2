<?php

class HomeController extends BaseController {

	protected $layout = "layouts.main";

    public function getHome() {
	    $this->layout->content = View::make('home');
	}

}

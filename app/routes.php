<?php

// User routes
Route::controller('users', 'UsersController');

// Password reset
Route::resource('password/remind', 'RemindersController', array(
    'only' => array('index', 'store')
));
Route::get('password/reset/{token}', 'RemindersController@show');
Route::post('password/reset/{token}', 'RemindersController@update');

// Home
Route::get('/', 'HomeController@getHome');
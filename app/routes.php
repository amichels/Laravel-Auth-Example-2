<?php

Route::get('/', 'HomeController@getHome');

// User routes
Route::get('users/edit', 'UsersController@getEdit');
Route::controller('users', 'UsersController');
Route::post('users/update', 'UsersController@postUpdate');

// Password reset
Route::resource('password/remind', 'RemindersController', array(
    'only' => array('index', 'store')
));
Route::get('password/reset/{token}', 'RemindersController@show');
Route::post('password/reset/{token}', 'RemindersController@update');

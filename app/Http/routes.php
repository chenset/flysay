<?php

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

//login to access
Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', ['as' => 'admin.index', 'uses' => 'Admin\IndexController@getIndex']); //admin index
});

//auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

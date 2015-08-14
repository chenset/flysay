<?php

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
Route::get('article/image/{datePath}/{fileName}', ['as' => 'article.image.upload.get', 'uses' => 'ArticleController@getImage']);//article image
Route::resource('article', 'ArticleController', ['only' => ['show']]);//article

//login to access
Route::group(['middleware' => ['auth']], function () {
    //article image upload
    Route::post('admin/article/image/upload', ['as' => 'admin.article.image.upload.post', 'uses' => 'Admin\ArticleController@postImage']);//article image

    Route::resource('admin/article', 'Admin\ArticleController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);//article

    Route::get('admin', ['as' => 'admin.index', 'uses' => 'Admin\IndexController@getIndex']); //admin index
});

//auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
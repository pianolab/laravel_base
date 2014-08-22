<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'auth'), function(){
  Route::get('/', 'HomeController@index');
  Route::get('/sign_out', 'SessionsController@sign_out');

  Route::resource('posts', 'PostsController');

  Route::post('attachments', 'AttachmentsController@create');
  Route::delete('{parent}/{id}/attachments/{attachments}/update', [ 'as' => 'attachments.update', 'uses' => 'AttachmentsController@update' ])
    ->where('id', '[0-9]+')->where('attachments', '[0-9]+');
  Route::delete('{parent}/{id}/attachments/{attachments}/destroy', [ 'as' => 'attachments.destroy', 'uses' => 'AttachmentsController@destroy' ])
    ->where('id', '[0-9]+')->where('attachments', '[0-9]+');
});

Route::get('/sign_in', 'SessionsController@sign_in');
Route::post('/authenticate', 'SessionsController@authenticate');

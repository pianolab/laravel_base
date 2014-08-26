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
# Routes before authentication
Route::group(array('before' => 'auth.admin'), function () {
    # Attachments upload
    Route::post('attachments', 'AttachmentsController@create');
    Route::put('{parent}/{id}/attachments/{attachments}', [ 'as' => 'attachments.update', 'uses' => 'AttachmentsController@update' ])
        ->where('id', '[0-9]+')->where('attachments', '[0-9]+');
    Route::delete('{parent}/{id}/attachments/{attachments}/destroy', [ 'as' => 'attachments.destroy', 'uses' => 'AttachmentsController@destroy' ])
        ->where('id', '[0-9]+')->where('attachments', '[0-9]+');

    # Administration name space
    Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function () {
        # Dashboard administration
        Route::get('/', 'DashboardController@index');

        # Posts admin
        Route::resource('posts', 'PostsController');
    });
});

Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, [ 'en', 'br' ])) {
        App::setLocale($lang);
        Session::put('lang', $lang);
    }
    return Redirect::back();
});

# Home application
Route::get('/', 'HomeController@index');

# Authentication
Route::get('/sign_in', 'SessionsController@sign_in');
Route::get('/sign_out', 'SessionsController@sign_out');
Route::post('/authenticate', 'SessionsController@authenticate');

# Tranlations for javascripts
Route::get('/languages/{file}.js', 'LanguagesController@js');

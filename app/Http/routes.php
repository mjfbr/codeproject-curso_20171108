<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function() {

	Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
	Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

/*
Route::group(['middleware' => 'checkProjectOwner'], function() {
	Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
});
*/

	Route::group(['prefix' => 'project'], function() {

		Route::get('{id}/note', 'ProjectNoteController@index');
		Route::post('{id}/note', 'ProjectNoteController@store');
		Route::put('note/{idNote}', 'ProjectNoteController@update');
		Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
		//Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
		Route::delete('note/{id}', 'ProjectNoteController@destroy');
		//Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');
		Route::post('{id}/file', 'ProjectFileController@store');
		
	});

	Route::get('user/authenticated', 'UserController@authenticated');
});

	/*
	Route::resource('projectNotes', 'ProjectNoteController');

	Route::get('project/{id}/note', 'ProjectNoteController@index');
	Route::post('project/{id}/note', 'ProjectNoteController@store');
	Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
	Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
	Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');

	Route::get('projectNotes', 'ProjectNoteController@index');
	Route::post('projectNotes', 'ProjectNoteController@store');
	Route::get('projectNotes', 'ProjectNoteController@show');
	Route::delete('projectNotes','ProjectNoteController@destroy');
	*/

	/*
	Route::resource('projects', 'ProjectControlller', ['except' => ['create', 'edit']]);
	Route::resource('projects', 'ProjectController');

	Route::get('projects', 'ProjectController@index');
	Route::post('projects', 'ProjectController@store');
	Route::get('projects', 'ProjectController@show');
	Route::delete('projects','ProjectController@destroy');
	*/

	/*
	Route::resource('clients', 'ClientController');

	Route::get('clients', ['middleware' => 'oauth', 'uses' => 'ClientController@index']);
	Route::get('clients', 'ClientController@index');
	Route::post('clients', 'ClientController@store');
	Route::get('clients/{id}', 'ClientController@show');
	Route::delete('clients/{id}', 'ClientController@destroy');
	*/

Route::get('/', function () {
    return view('app');
});
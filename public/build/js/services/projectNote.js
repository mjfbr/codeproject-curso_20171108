angular.module('app.services')
.service('ProjectNote',['$resource','appConfig',function($resource,appConfig){
		return $resource(appConfig.baseUrl + '/project/:id/note/:idNote',{
			id: '@id',
			idNote: '@idNote'
		},{
			update: {
				method: 'PUT'
			}
		})
	}]);



/*
	Route::group(['prefix' => 'projects'], function() {

		Route::get('{id}/note', 'ProjectNoteController@index');
		Route::post('{id}/note', 'ProjectNoteController@store');
		Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
		Route::delete('note/{id}', 'ProjectNoteController@destroy');

		Route::post('{id}/file', 'ProjectFileController@store');
		
	});
	*/
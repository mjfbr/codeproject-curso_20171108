angular.module('app.services')
.service('ProjectNote',['$resource','appConfig',function($resource,appConfig){
		return $resource(appConfig.baseUrl + '/project/:id/note/:idNote',{
			id: '@id',
			idNote: '@idNote'
		},{
			update: {
				method: 'PUT'
			},
			/********************** I M P O R T A N T E *********************
			Olhar a aula do angular: Resolvendo problema do transformResponse do resource projectNote
			*********************** I M P O R T A N T E ********************/
			get:{
				method: 'GET',
				transformResponse: function(data, headers){
					var headersGetter = headers();
					if(headersGetter['content-type'] == 'application/json' ||
						headersGetter['content-type'] == 'text/json'){
						var dataJson = JSON.parse(data);
						if(dataJson.hasOwnProperty('data')){
							dataJson = dataJson.data;
						}
						return dataJson[0];
					}
					return data;
				}
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
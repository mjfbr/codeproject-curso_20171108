angular.module('app.services')
.service('ProjectFile',['$resource','appConfig','Url',function($resource,appConfig,Url){
		var url = appConfig.baseUrl + Url.getUrlResource(appConfig.urls.projectFile);
		return $resource(url,{
			id: '@id',
			idFile: '@idFile'
		},{
			update: {
				method: 'PUT'
			},
			download: {
				url: appConfig.baseUrl + 
				Url.getUrlResource(appConfig.urls.projectFile) + '/download',
				method: 'GET'
			}
			/*,
			********************* I M P O R T A N T E *********************
			Olhar a aula do angular: Resolvendo problema do transformResponse do resource projectNote
			*********************** I M P O R T A N T E *******************
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
			}*/
		});
	}]);
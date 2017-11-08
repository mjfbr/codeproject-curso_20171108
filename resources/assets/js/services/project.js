angular.module('app.services')
.service('Project',['$resource','appConfig',function($resource,appConfig){
		return $resource(appConfig.baseUrl + '/project/:id',{id: '@id'},{
			update: {
				method: 'PUT'
			}/*,

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

angular.module('app.controllers')
    .controller('HomeController',['$scope', '$cookies', function($scope, $cookies ){
        console.log($cookies.getObject('user').email);

    }]);

/* original
angular.module('app.controllers')
	.controller('HomeController',['$scope',function($scope){

	}]);
*/
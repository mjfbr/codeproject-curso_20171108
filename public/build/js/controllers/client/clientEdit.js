angular.module('app.controllers')
	.controller('ClientEditController',
	['$scope','$location','$routeParams','Client','$cookies',
		function($scope, $location, $routeParams, Client,$cookies){
		
		$scope.client = Client.get({id:$routeParams.id});
		$scope.user = $cookies.getObject('user');

		$scope.save = function(){
			if($scope.form.$valid){
				Client.update({id: $scope.client.id},$scope.client,function(){
					alert('Cliente editado com sucesso!');
					$location.path('/clients');
				});
			}
		}

	}]);
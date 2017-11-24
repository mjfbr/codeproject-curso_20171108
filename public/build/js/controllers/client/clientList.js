angular.module('app.controllers')
	.controller('ClientListController', ['$scope','Client','$cookies',function($scope, Client,$cookies){
		$scope.clients=Client.query();
		$scope.user = $cookies.getObject('user');

	}]);
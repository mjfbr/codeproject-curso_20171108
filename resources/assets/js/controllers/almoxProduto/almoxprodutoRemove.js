angular.module('app.controllers')
	.controller('AlmoxProdutoRemoveController',
	['$scope','$location','$routeParams','AlmoxProduto',
		function($scope, $location, $routeParams, AlmoxProduto){
		$scope.almoxProdutos = AlmoxProduto.get({id:$routeParams.id});

		$scope.remove = function(){
			$scope.almoxProduto.$delete({id: $scope.almoxProduto.id}).then(function(){
				$location.path('/almoxprodutos/');
			});

		}

	}]);
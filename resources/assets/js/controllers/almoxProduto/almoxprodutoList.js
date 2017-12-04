angular.module('app.controllers')
	.controller('AlmoxProdutoListController', [
		'$scope','$routeParams','AlmoxProduto',function($scope, $routeParams, AlmoxProduto){
		
		$scope.almoxProdutos = [];
		$scope.totalAlmoxProdutos = 0;
		$scope.almoxProdutosPerPage = 10;

		$scope.pagination = {
			current: 1
		};

		$scope.pageChanged = function(newPage){
			getResultsPage(newPage);
			//$scope.totalUsers = result.data.Count
		};

		function getResultsPage(pageNumber){
			AlmoxProduto.query({
				page: pageNumber,
				limit: $scope.almoxProdutosPerPage
			}, function(data){
				$scope.almoxProdutos = data.data;
				$scope.totalAlmoxProdutos = data.meta.pagination.total;
			});
		}

		//para ordenar
		$scope.sort = function(keyname){
			$scope.sortKey = keyname;
			$scope.reverse = !$scope.reverse;
		}

		getResultsPage(1);
	}]);
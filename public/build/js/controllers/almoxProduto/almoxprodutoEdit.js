/* modelo para autocomplete*/

angular.module('app.controllers')
	.controller('AlmoxProdutoEditController',
	['$scope','$routeParams','$location','$cookies','AlmoxProduto','Client','appConfig',
	function($scope,$routeParams,$location,$cookies,AlmoxProduto,Client,appConfig){
		AlmoxProduto.get({id: $routeParams.id}, function(data){
			$scope.almoxProduto = data;
			$scope.clientSelected = data.client.data;
		});
		


		$scope.almoxProduto = appConfig.AlmoxProduto.status;

		$scope.save = function(){
			if($scope.form.$valid){
				$scope.almoxProduto.owner_id = $cookies.getObject('user').id;
				AlmoxProduto.update({id: $scope.almoxProduto.id},$scope.almoxProduto,function(){
					$location.path('/almoxprodutos');
				});
			}
		};

		$scope.formatName = function(model){
			if(model){
				return model.name;
			}
			return '';
		};
		




	}]);

/* modelo para select option

angular.module('app.controllers')
	.controller('ProjectEditController',
	['$scope','$routeParams','$location','$cookies','Project','Client','appConfig',
	function($scope,$routeParams,$location,$cookies,Project,Client,appConfig){
		$scope.project = new Project.get({id: $routeParams.id});
		$scope.clients = Client.query();
		$scope.status = appConfig.project.status;

		$scope.save = function(){
			if($scope.form.$valid){
				$scope.project.owner_id = $cookies.getObject('user').id;
				Project.update({id: $scope.project.id},$scope.project,function(){
					$location.path('/projects');
				});
			}
		}
	}]);

*/
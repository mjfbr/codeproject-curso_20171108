angular.module('app.controllers')
	.controller('AlmoxProdutoNewController',
	['$scope','$location','$cookies','AlmoxProduto','Client','appConfig',
	function($scope, $location,$cookies,AlmoxProduto,Client,appConfig){
		$scope.almoxProduto = new AlmoxProduto();
		$scope.status = appConfig.almoxProduto.status;

		$scope.due_date = {
			status:{
				opened: false
			}
		};

		$scope.open=function($event){
			$scope.due_date.status.opened = true;
		};

		$scope.save = function(){
			if($scope.form.$valid){
				$scope.almoxProduto.owner_id = $cookies.getObject('user').id;
				$scope.almoxProduto.$save().then(function(){
					$location.path('/almoxprodutos');
				});
			}
		}

		$scope.formatName = function(model){
			if(model){
				return model.name;
			}
			return '';
		};
		
		$scope.getClients = function (name){
			return Client.query({
				search: name,
				searchFields:'name:like'
			}).$promise;
		};

		$scope.selectClient = function(item){
			$scope.project.client_id = item.id;
		};
	}]);

/* modelo select option
angular.module('app.controllers')
	.controller('ProjectNewController',
	['$scope','$location','$cookies','Project','Client','appConfig',
	function($scope, $location,$cookies,Project,Client,appConfig){
		$scope.project = new Project();
		$scope.clients = Client.query();
		$scope.status = appConfig.project.status;

		$scope.save = function(){
			if($scope.form.$valid){
				$scope.project.owner_id = $cookies.getObject('user').id;
				$scope.project.$save().then(function(){
					$location.path('/projects');
				});
			}
		}

		$scope.formatName = function(id){
			if(id){
				for(var i in $scope.clients){
					if($scope.clients[i].id == id){
						return $scope.clients[i].name;
					}
				}
			}
			return '';
		};
		
		$scope.getClients = function (name){
			return Client.query({
				search: name,
				searchFields:'name:like'
			}).$promise;
		};
	}]);
*/
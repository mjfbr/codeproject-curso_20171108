angular.module('app.controllers')
	.controller('LoginModalController', 
		['$rootScope','$scope','$location','$cookies','User','$modalInstance','authService','OAuth', 'OAuthToken','$route', 
		function ($rootScope,$scope,$location,$cookies,User,$modalInstance,authService,OAuth,OAuthToken,$route){
		$scope.user={
			username : '',
			password : ''
		};

		$scope.error = {
			message:'',
			error: false
		};

		$scope.$on('event:auth-loginConfirmed',function(){
			$rootScope.loginModalOpened = false;
			$modalInstance.close();
		});

		$scope.$on('$routeChangeStart',function(){
			$rootScope.loginModalOpened = false;
			$modalInstance.dismiss('cancel');
		});

		$scope.$on('event:auth-loginCancelled', function(){
			OAuthToken.removeToken();
		});

		$scope.login = function(){
			if($scope.form.$valid){
				OAuth.getAccessToken($scope.user).then(function(){
					User.authenticated({}, {}, function(data){
						$cookies.putObject('user', data);
						authService.loginConfirmed();
						$route.reload(); // para autenticar foi colocado essa linha e $route
					});
					
				}, function(data){
					$scope.error.error = true;
					$scope.error.message = data.data.error_description;
				});
			}
		};

		$scope.cancel = function(){
			authService.loginCancelled();
			$location.path('login');
		};
	}]);


/* modelo original, sem a autencição de página
angular.module('app.controllers')
	.controller('LoginModalController', 
		['$rootScope','$scope','$location','$cookies','User','$modalInstance','authService','OAuth', 'OAuthToken', 
		function ($rootScope,$scope,$location,$cookies,User,$modalInstance,authService,OAuth,OAuthToken){
		$scope.user={
			username : '',
			password : ''
		};

		$scope.error = {
			message:'',
			error: false
		};

		$scope.$on('event:auth-loginConfirmed',function(){
			$rootScope.loginModalOpened = false;
			$modalInstance.close();
		});

		$scope.$on('$routeChangeStart',function(){
			$rootScope.loginModalOpened = false;
			$modalInstance.dismiss('cancel');
		});

		$scope.$on('event:auth-loginCancelled', function(){
			OAuthToken.removeToken();
		});

		$scope.login = function(){
			if($scope.form.$valid){
				OAuth.getAccessToken($scope.user).then(function(){
					User.authenticated({}, {}, function(data){
						$cookies.putObject('user', data);
						authService.loginConfirmed();
					});
					
				}, function(data){
					$scope.error.error = true;
					$scope.error.message = data.data.error_description;
				});
			}
		};

		$scope.cancel = function(){
			authService.loginCancelled();
			$location.path('login');
		};
	}]);
	*/
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	@if(Config::get('app.debug'))
		<link href="{{ asset('build/css/app.css') }}" rel="stylesheet"/>
		<link href="{{ asset('build/css/components.css') }}" rel="stylesheet"/>
		<link href="{{ asset('build/css/flaticon.css') }}" rel="stylesheet"/>
		<link href="{{ asset('build/css/font-awesome.css') }}" rel="stylesheet"/>
	@else
		<link href="{{ elixir('css/all.css') }}" rel="stylesheet"/>
	@endif

	<!-- Fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<load-template url="/build/views/templates/menu.html"></load-template>
	<!--<div ng-include="'build/views/templates/menu.html'"></div>-->

	<div ng-view></div>

	<!-- Scripts !-->
@if(Config::get('app.debug'))
	<script src="{{asset('build/js/vendor/jquery.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-route.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-resource.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-animate.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-messages.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/ui-bootstrap-tpls.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/navbar.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-cookies.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/query-string.js')}}"></script>
	<script src="{{asset('build/js/vendor/angular-oauth2.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/ng-file-upload.min.js')}}"></script>
	<script src="{{asset('build/js/vendor/http-auth-interceptor.js')}}"></script>
	<script src="{{asset('build/js/vendor/dirPagination.js')}}"></script>
	
	<script src="{{asset('build/js/app.js')}}"></script>

	<!-- CONTROLLERS !-->
	<script src="{{asset('build/js/controllers/login.js')}}"></script>
	<script src="{{asset('build/js/controllers/home.js')}}"></script>
	<script src="{{asset('build/js/controllers/menu.js')}}"></script>
	<script src="{{asset('build/js/controllers/loginModal.js')}}"></script>

	<!-- CONTROLLERS Clients !-->
	<script src="{{asset('build/js/controllers/client/clientList.js')}}"></script>
	<script src="{{asset('build/js/controllers/client/clientNew.js')}}"></script>
	<script src="{{asset('build/js/controllers/client/clientEdit.js')}}"></script>
	<script src="{{asset('build/js/controllers/client/clientRemove.js')}}"></script>

	<!-- CONTROLLERS Project !-->
	<script src="{{asset('build/js/controllers/project/projectList.js')}}"></script>
	<script src="{{asset('build/js/controllers/project/projectNew.js')}}"></script>
	<script src="{{asset('build/js/controllers/project/projectEdit.js')}}"></script>
	<script src="{{asset('build/js/controllers/project/projectRemove.js')}}"></script>

	<!-- CONTROLLERS ProjectNote !-->
	<script src="{{asset('build/js/controllers/project-note/projectNoteShow.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-note/projectNoteList.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-note/projectNoteNew.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-note/projectNoteEdit.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-note/projectNoteRemove.js')}}"></script>

	<!-- CONTROLLERS ProjectFile - UPLOAD !-->
	<script src="{{asset('build/js/controllers/project-file/projectFileList.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-file/projectFileNew.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-file/projectFileEdit.js')}}"></script>
	<script src="{{asset('build/js/controllers/project-file/projectFileRemove.js')}}"></script>

	<!-- CONTROLLERS ProjectTask !-->
	<script src="{{ asset('build/js/controllers/project-task/projectTaskList.js') }}"></script>
	<script src="{{ asset('build/js/controllers/project-task/projectTaskNew.js') }}"></script>
	<script src="{{ asset('build/js/controllers/project-task/projectTaskEdit.js') }}"></script>
	<script src="{{ asset('build/js/controllers/project-task/projectTaskRemove.js') }}"></script>

	<!-- CONTROLLERS ProjectMember !-->
	<script src="{{ asset('build/js/controllers/project-member/projectMemberList.js') }}"></script>
	<script src="{{ asset('build/js/controllers/project-member/projectMemberRemove.js') }}"></script>

	<!-- CONTROLLERS almoxproduto - almoxarifado !-->
	<script src="{{asset('build/js/controllers/almoxProduto/almoxprodutoList.js')}}"></script>
	<script src="{{asset('build/js/controllers/almoxProduto/almoxprodutoRemove.js')}}"></script>
	<script src="{{asset('build/js/controllers/almoxProduto/almoxprodutoEdit.js')}}"></script>
	<script src="{{asset('build/js/controllers/almoxProduto/almoxprodutoNew.js')}}"></script>




	<!-- deletar depois -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<!-- DIRECTIVES !-->
  	<script src="{{asset('build/js/directives/projectFileDownload.js')}}"></script>
  	<script src="{{asset('build/js/directives/loginForm.js')}}"></script>
  	<script src="{{asset('build/js/directives/loadTemplate.js')}}"></script>

	<!-- FILTERS !-->
  	<script src="{{asset('build/js/filters/date-br.js')}}"></script>

	<!-- SERVICES !-->
	<script src="{{asset('build/js/services/oauthFixInterceptor.js')}}"></script>
	<script src="{{asset('build/js/services/url.js')}}"></script>
	<script src="{{asset('build/js/services/client.js')}}"></script>
	<script src="{{asset('build/js/services/project.js')}}"></script>
	<script src="{{asset('build/js/services/projectNote.js')}}"></script>
	<script src="{{asset('build/js/services/projectFile.js')}}"></script>
	<script src="{{asset('build/js/services/user.js')}}"></script>
	<script src="{{asset('build/js/services/projectTask.js')}}"></script>
	<script src="{{asset('build/js/services/almoxproduto.js')}}"></script>
@else
	<script src="{{elixir('js/all.js')}}"></script>
@endif

</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>App Name - @yield('title')</title>
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/custom.css">
		<!--        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
	</head>
	<body>
		@include('components.navbar1')
	@show

	<div id="app" class="container-fluid">
		<div class="row">
			@include('components.sidebar1')
			<main class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">    
				@if(session('error'))			
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
				@endif
				@if(session('success'))			
					<div class="alert alert-success">
						{{session('success')}}
					</div>
				@endif
			@yield('content')
			</main>
		</div>
	</div>
	<footer class="footer">
		<div class="containter">
	</footer>
	<script type="text/javascript" src="/js/app.js"></script>
	</body>
</html>

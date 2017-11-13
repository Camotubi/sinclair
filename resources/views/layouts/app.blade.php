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

		<div id="app" class="container">
		    @yield('content')
		</div>
    <footer class="footer">
      <div class="containter">
        El footer
      </div>
    </footer>
<!--<script src="/js/components_util.js"></script> -->
<script src="/js/app.js"></script>
</body>
</html>

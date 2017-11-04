<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>App Name - @yield('title')</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/custom.css">
<script src="/js/app.js"></script>
<!--        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
    </head>
    <body>
@include('components.navbar1')
	@show

		<div class="container">
		    @yield('content')
		</div>
    <footer class="footer">
      <div class="containter">
        El footer
      </div>
    </footer>
<!--<script src="/js/components_util.js"></script> -->
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>App Name - @yield('title')</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/custom.css">
<!--        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
    </head>
    <body>
{{--	@include('navbar1') --}}
{{--	@section('sidebar') --}}
	@show
		<div class="container">
		    @yield('content')
		</div>
<script src="/js/app.js"></script>	
<!--<script src="/js/components_util.js"></script> -->
</body>
</html>

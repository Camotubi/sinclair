<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Fundación Maestro Alfredo Sinclair B. - yield('title')</title>
		<link rel="icon" href="/icon/logo_2_TdQ_icon.ico">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/frontend/estilos.css">
	</head>
	<body>

		<div class="container">
			<header>
				<a href="/index">
					<img src="/img/logo_FMASinclairB.jpg" alt="NO SE ENCONTRÓ LA IMÁGEN." height="150px">
				</a>
			</header>

			<nav>
				<ul class="barra">
					<li><a href="/index">INICIO</a></li>
					<li><a href="/quienes_somos">¿QUIÉNES SOMOS?</a></li>
					<li><a href="/alfredo">ALFREDO SINCLAIR B.</a></li>
					<li><a href="/f/artPiece/index">GALERIA</a></li>
					<li><a href="/f/publication/index">PUBLICACIONES</a></li>
					<li><a href="/cita">VISITAR MUSEO</a></li>
					<li><a href="/contacto">CONTACTO</a></li>
				</ul>
			</nav>
			@yield('content')
			<footer>
				<div class="container-fluid">
					<h6 class="small">COPYRIGHT © 2017 UTP TODOS LOS DERECHOS RESERVADOS</h6>
				</div>
			</footer>

	<script type="text/javascript" src="/js/app.js"></script>
	</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Fundación Maestro Alfredo Sinclair B. - yield('title')</title>
	<link rel="icon" href="icon/logo_2_TdQ_icon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

	<div class="container">
		<header>
			<a href="index.html">
				<img src="img/logo_FMASinclairB.jpg" alt="NO SE ENCONTRÓ LA IMÁGEN." height="150px">
			</a>
		</header>

		<nav>
			<ul class="barra">
				<li><a href="#">INICIO</a></li>
				<li><a href="html/quienes_somos.html">¿QUIÉNES SOMOS?</a></li>
				<li><a href="html/alfredo.html">ALFREDO SINCLAIR B.</a></li>
				<li><a href="html/galeria.html">GALERIA</a></li>
				<li><a href="html/cita.html">VISITAR MUSEO</a></li>
				<li><a href="html/contacto.html">CONTACTO</a></li>
			</ul>
		</nav>
    @yield('content')
    <footer>
			<div class="container-fluid">
				<h6 class="small">COPYRIGHT © 2017 UTP TODOS LOS DERECHOS RESERVADOS</h6>
			</div>
		</footer>

	<script src="js\jquery-3.2.1.min.js"></script>
	<script src="js\bootstrap.min.js"></script>
</body>
</html>

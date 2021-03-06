<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<a class="navbar-brand" href="#">Sinclair</a>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="/dashboard">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">Pagina Principal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/stats">Estadisticas</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div >
			@isset($user)
			<div class="dropdown">
				<button class ="btn btn-outline-info my-2 my-sm-0 dropdown-toggle nav-item" type ="button" id="userDropDownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				{{$user->name}}
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/logout">Cerrar Sesion</a>
  </div>
		</div>
			@endisset
		</div>
	</div>
</nav>

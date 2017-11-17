@extends('layouts.app')

@section('title')
	Registro de Visitante
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Visitante</h3>
				<form class=""  action= "/visitor" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="firstname">Nombre:</label>
							<input class="form-control" type="text" name="firstname" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="lastname">Apellido:</label>
							<input class="form-control" type="text" name="lastname" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Cédula:</label>
							<input class="form-control" type="text" name="nin" value="">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

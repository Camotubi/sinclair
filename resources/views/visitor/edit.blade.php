@extends('layouts.app')

@section('title')
	Actualización de Visitante
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Visitante</h3>
				<form class=""  action= "/visitor/{{$visitor->id}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT/PATCH">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="firstname">Nombre:</label>
							<input class="form-control" type="text" name="firstname" value="{{$visitor->firstname}}">
						</div>
						<div class="form-group col-md-4">
							<label for="lastname">Apellido:</label>
							<input class="form-control" type="text" name="lastname" value="{{$visitor->lastname}}">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Cédula:</label>
							<input class="form-control" type="text" name="nin" value="{{$visitor->nin}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

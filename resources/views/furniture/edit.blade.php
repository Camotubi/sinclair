@extends('layouts.app')

@section('title')
	Actualización de Mueble
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Mueble</h3>
				<form class="" action="/furniture/{{$furniture->id}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$furniture->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="furnitureTypeId">Tipo de mueble:</label>
							<input class="form-control" type="text" name="furnitureTypeId" value="{{$furniture->furnitureTypeId}}">
						</div>
						<div class="form-group col-md-4">
							<label for="donatorId">Donador:</label>
							<input class="form-control" type="text" name="donatorId" value="{{$furniture->donatorId}}">
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

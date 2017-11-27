@extends('layouts.app')

@section('title')
	Actualización de Exhibición
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Exhibición</h3>
				<form class=""  action= "/exhibition/{{$exhibition->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$exhibition->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="location">Lugar:</label>
							<input class="form-control" type="text" name="location" value="{{$exhibition->location}}">
						</div>
						<div class="form-group col-md-4">
							<label for="date">Fecha:</label>
							<input class="form-control" type="date" name="date" value="{{$exhibition->date}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

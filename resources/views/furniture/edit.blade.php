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
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$furniture->name}}">
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

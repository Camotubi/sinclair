@extends('layouts.app')

@section('title')
	Actualización de Visita
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Visita</h3>
				<form class=""  action= "/visit/{{$visit->id}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT/PATCH">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="date">Fecha:</label>
							<input class="form-control" type="date" name="date" value="{{$visit->date}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

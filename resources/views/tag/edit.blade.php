@extends('layouts.app')

@section('title')
	Actualización de Etiqueta
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Etiqueta</h3>
				<form class=""  action= "/tag/{{$tag->id}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT/PATCH">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="tag">Nombre:</label>
							<input class="form-control" type="tag" name="name" value="{{$tag->name}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

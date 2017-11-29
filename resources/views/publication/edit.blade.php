@extends('layouts.app')

@section('title')
	Actualización de Publicación
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Publicación</h3>
				<form class="" action="/publication/{{$publication->id}}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="title">Título:</label>
							<input class="form-control" type="text" name="title" value="{{$publication->title}}">
						</div>
						<div class="form-group col-md-6">
							<label for="body">Contenido:</label>
							<textarea class="form-control" name="body" rows="20"
								cols="120">{{$publication->body}}</textarea>
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

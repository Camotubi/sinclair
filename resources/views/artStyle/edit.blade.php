@extends('layouts.app')

@section('title')
	Actualiación de Estilo de Arte
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Estilo de Arte</h3>
				<form class=""  action= "/artStyle/{{$artStyle->id}}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$artStyle->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80" >{{$artStyle->description}}</textarea>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

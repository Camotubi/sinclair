
@extends('layouts.app')

@section('title')
	Actualización de obra de arte
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de obra de arte</h3>
				<form class=""  action= "/artPiece/{{$artPiece->id}}" method="post">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$artPiece->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="era">Era:</label>
							<input class="form-control" type="text" name="era" value="{{$artPiece->era}}">
						</div>
						<div class="form-group col-md-4">
							<label for="technique">Técnica:</label>
							<input class="form-control" type="text" name="technique" value="{{$artPiece->technique}}">
						</div>
						<div class="form-group col-md-4">
							<label for="creationDate">Fecha de creación:</label>
							<input class="form-control" type="date" name="creationDate" value="{{$artPiece->creationDate}}">
						</div>
						<div class="form-group col-md-4">
							<label for="currentLocation">Localización actual:</label>
							<input class="form-control" type="text" name="currentLocation" value="{{$artPiece->currentLocation}}">
						</div>
						<div class="form-group col-md-4">
							<label for="criticalAnalisis">Analisis Crítico:</label>
							<textarea class="form-control" name="criticalAnalisis" rows="8" cols="80">{{$artPiece->criticalAnalisis}}</textarea>
						</div>
						<div class="form-group col-md-6">
							<input class="form-control" type="file" name="file" accept="*">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

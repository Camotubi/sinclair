@extends('layouts.app')

@section('title')
	Registro de Exhibición
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Exhibición</h3>
				<form class=""  action= "/exhibition" method="post">
					{{ csrf_field() }}
				<datalist id="artPieces">
					@foreach($artPieces as $artPiece)
						<option value="{{$artPiece->id.'-'.$artPiece->name}}">
					@endforeach
				</datalist>
				<datalist id="legalEntities">
					@foreach($legalEntities as $legalEntity)
						<option value="{{$legalEntity->id.'-'.$legalEntity->name}}">
					@endforeach
				</datalist>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="location">Lugar:</label>
							<input class="form-control" type="text" name="location" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="date">Fecha:</label>
							<input class="form-control" type="date" name="date" value="">
						</div>
					</div>
					<div class ="form-row">
						<div class="col">
							<label>Piezas de Arte</label>
							@for($i = 0; $i < $numArtPieces; $i++)
								<div class="form-group">
								<input class ="form-control" list="artPieces" name="artPieces[]">
								</div>
							@endfor
							<a href="/exhibition/create?numLegalEntities={{$numLegalEntities}}&numArtPieces={{$numArtPieces}}&modArtPieceFields=p">Agregar</a>
							<a href="/exhibition/create?numLegalEntities={{$numLegalEntities}}&numArtPieces={{$numArtPieces}}&modArtPieceFields=m">Quitar</a>
						</div>
						<div class="col">
							<label>Organizadores</label>
							@for($i = 0; $i < $numLegalEntities; $i++)
							<div class="form-group">
							<input class="form-control" list="legalEntities" name="legalEntities[]">
								</div>
						@endfor
							<a href="/exhibition/create?numLegalEntities={{$numLegalEntities}}&numArtPieces={{$numArtPieces}}&modLegalEntityFields=p">Agregar</a>
							<a href="/exhibition/create?numLegalEntities={{$numLegalEntities}}&numArtPieces={{$numArtPieces}}&modLegalEntityFields=m">Quitar</a>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

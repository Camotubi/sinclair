@extends('layouts.app')

@section('title')
	Registro de obra de arte
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de obra de arte</h3>
				<form class=""  action= "/artPiece" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="era">Era:</label>
							<input class="form-control" type="text" name="era" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="style">Estilo:</label>
							<input class="form-control" name="artStyleId" type="text" list="artStyles">
    								<datalist id="artStyles">
											@foreach($artStyles as $artStyle)
												<option value ="{{$artStyle->id}}">{{$artStyle->name}}</option>
											@endforeach
    								</datalist>
						</div>
						<div class="form-group col-md-4">
							<label for="technique">Técnica:</label>
							<input class="form-control" type="text" name="technique" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="creationDate">Fecha de creación:</label>
							<input class="form-control" type="date" name="creationDate" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="currentLocation">Localización actual:</label>
							<input class="form-control" type="text" name="currentLocation" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="criticalAnalisis">Analisis Crítico:</label>
							<textarea class="form-control" name="criticalAnalisis" rows="8" cols="80"></textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="donatorId">Donador:</label>
							<input type="text" class="form-control" name="donatorId" value="" list="legalEntities">
								<datalist id="legalEntities">
									@foreach($legalEntities as $legalEntity)
										<option value ="{{$legalEntity->id}}"> {{$legalEntity->name}}</option>
									@endforeach
								</datalist>
						</div>
						<div class ="form-check">
							<label class="form-check-label">
								Generar Publicación
								<input class="form-check-input" name="genaratePublication" type="checkbox" value="true">
							</label>
						</div>
						<div class="form-group col-md-6">
							<input class="form-control" type="file" name="file" accept="*">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

@endsection

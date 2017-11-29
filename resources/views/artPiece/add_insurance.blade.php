
@extends('layouts.app')

@section('title')
	Registro de Seguro de una Obra
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Seguro de una Obra</h3>
				<form class=""  action= "/insurance" method="post">
					{{ csrf_field }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="artPieceId">Obra:</label>
							<input class="form-control" type="text" name="artPiece"
							value="{{$artPiece->id.'-'.$artPiece->name}}" disabled>
						</div>
						<div class="form-group col-md-4">
							<label for="insuranceCarrierId">Aseguradora:</label>
							<input class="form-control" type="text" name="insuranceCarrier"
								value="" list="insuranceCarriers">
							<datalist id="insuranceCarriers">
							  @foreach($insuranceCarriers as $insuranceCarrier)
								  <option value ="{{$insuranceCarrier->id}}-{{$insuranceCarrier->name}}">
							  @endforeach
							</datalist>
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80"></textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="cost">Costo:</label>
							<input class="form-control" type="number" step="any" name="cost" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="effectiveDate">Fecha de efectividad:</label>
							<input class="form-control" type="date" name="effectiveDate" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="terminationDate">Fecha de terminación:</label>
							<input class="form-control" type="date" name="terminationDate" value="">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

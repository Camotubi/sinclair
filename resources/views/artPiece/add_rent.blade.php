
@extends('layouts.app')

@section('title')
	Registro de Alquiler de Obra
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Alquiler de Obra</h3>
				<form class="" action="/artPiece/{{$artPiece->id}}/addRent" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="artPieceId">Obra:</label>
							<input class="form-control" type="text" value="{{$artPiece->name}}" disabled >
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="legalEntityId" value="" list="legalEntities">
								<datalist id="legalEntities">
									@foreach($legalEntities as $legalEntity)
										<option value ="{{$legalEntity->id}}-{{$legalEntity->name}}"> 
									@endforeach
								</datalist>
						</div>
						<div class="form-group col-md-4">
							<label for="moneyQuantity">Cantidad de dinero:</label>
							<input class="form-control" type="number" step="any" name="moneyQuantity" value="">
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
					<input type="submit" name="register" class="btn btn-primary" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

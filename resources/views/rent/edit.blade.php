@extends('layouts.app')

@section('title')
	Actualización de Alquiler de Obra
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Alquiler de Obra</h3>
				<form class="" action="/rent/{{$rent->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="artPieceId">Obra:</label>
							<input class="form-control" type="text" name="artPieceId"
								value="{{$rent->artPieceId}}" list="artPieces">
							<datalist id="artPieces">
							  @foreach($artPieces as $artPiece)
							    <option value ="{{$artPiece->id}}"> {{$artPiece->name}}</option>
							  @endforeach
							</datalist>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="legalEntityId"
								value="{{$rent->legalEntityId}}" list="legalEntities">
								<datalist id="legalEntities">
									@foreach($legalEntities as $legalEntity)
										<option value ="{{$legalEntity->id}}"> {{$legalEntity->name}}</option>
									@endforeach
								</datalist>
						</div>
						<div class="form-group col-md-4">
							<label for="moneyQuantity">Cantidad de dinero:</label>
							<input class="form-control" type="number" step="any" name="moneyQuantity" value="{{$rent->moneyQuantity}}">
						</div>
						<div class="form-group col-md-4">
							<label for="effectiveDate">Fecha de efectividad:</label>
							<input class="form-control" type="date" name="effectiveDate" value="{{$rent->effectiveDate}}">
						</div>
						<div class="form-group col-md-4">
							<label for="terminationDate">Fecha de terminación:</label>
							<input class="form-control" type="date" name="terminationDate" value="{{$rent->terminationDate}}">
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

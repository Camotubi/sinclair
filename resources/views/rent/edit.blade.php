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
					<input type="hidden" name="_method" value="PUT/PATCH">
					<div class="form-row">
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

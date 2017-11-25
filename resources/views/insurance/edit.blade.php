@extends('layouts.app')

@section('title')
	Actualización de Seguro de una Obra
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Seguro de una Obra</h3>
				<form class=""  action= "/insurance/{{$insurance->id}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$insurance->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="artPieceId">Obra:</label>
							<input class="form-control" type="text" name="artPieceId" value="{{$insurance->artPieceId}}">
						</div>
						<div class="form-group col-md-4">
							<label for="insuranceCarrierId">Aseguradora:</label>
							<input class="form-control" type="text" name="insuranceCarrierId" value="{{$insurance->insuranceCarrierId}}">
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80">{{$insurance->description}}</textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="cost">Costo:</label>
							<input class="form-control" type="number" step="any" name="cost" value="{{$insurance->cost}}">
						</div>
						<div class="form-group col-md-4">
							<label for="effectiveDate">Fecha de efectividad:</label>
							<input class="form-control" type="date" name="effectiveDate" value="{{$insurance->effectiveDate}}">
						</div>
						<div class="form-group col-md-4">
							<label for="terminationDate">Fecha de terminación:</label>
							<input class="form-control" type="date" name="terminationDate" value="{{$insurance->terminationDate}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection



@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
	<form class=""  action="/api/artPiece/filter/execute" method="get" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3>Filtro</h3>
		<div class="form-row">
			<div class="from-group col">
				<label>Nombre</label>
				<input  class="form-control" name ="name">
			</div>
			<div class="from-group col">
				<label>Fecha minima</label>
				<input type="date" class="form-control" name ="lowerDate">
			</div>
			<div class="from-group col">
				<label>Fecha maxima</label>
				<input type="date" class="form-control" name ="upperDate">
			</div>
		</div>
		<div class="form-row">
			<div class="from-group col">
				<label>Tecnica</label>
				<input  class="form-control" name ="technique">
			</div>
			<div class="from-group col">
				<label>Localizacion</label>
				<input  class="form-control" name ="currentLocation">
			</div>
		</div>
		<br>
		<div class="form-group form-row">
			<div class="col-sm-10">
				<input class="btn btn-primary" type="submit" value="Realizar busqueda">
			</div>
		</div>
	</form>

</div>

@endsection

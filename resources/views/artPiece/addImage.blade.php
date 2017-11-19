
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
	<form class=""  method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3>Agregar imagen</h3>
		<input class ="form-control form-control-sm" type ="file" name = "image">
		<div class="form-row">
			<div class="from-group col">
				<label>Descripcción de la imagen:</label>
				<textarea class = "form-control" name = "description"></textarea>
			</div>
		</div>
		<div class="form-group form-row">
			<div class="col-sm-10">
				<input class="btn btn-primary" type="submit" value="Agregar Imagen">
			</div>
		</div>
	</form>

</div>

@endsection

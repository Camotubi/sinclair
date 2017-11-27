@extends('layouts.app')

@section('title')
Registro de restauración de inmobiliario
@endsection

@section('content')
<div>
	<form class=""  method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3>Registro de restauración de inmobiliario</h3>
		<label>Restaurador:</label>
		<textarea name="description">
		</textarea>
				<input class="btn btn-primary" type="submit" value="Agregar Imagen">
			</div>
		</div>
	</form>

</div>

@endsection

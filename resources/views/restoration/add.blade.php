@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
	
	<form class=""  method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3>Agregar restauracion</h3>
		<label>Restaurador:</label>
		<textarea name="description">
		</textarea>
				<input class="btn btn-primary" type="submit" value="Agregar Imagen">
			</div>
		</div>
	</form>

</div>

@endsection

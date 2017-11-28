@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>	
	@isset($artPiece)
	<h3>{{$artPiece->name}}</h3>
	@endisset

	<form class=""  action="/artPiece/{{$artPiece->id}}/restoration" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h4>Agregar restauracion</h4>
		<div class="row">
			<div class="col-3">
				<div class="form-group">
					<label>Restaurador:</label>
					<select name="restorerId" class ="custom-select form-control">
					@foreach($legalEntities as $legalEntity)
						<option value="{{$legalEntity->id}}">{{$legalEntity->name}}</option>		
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Fecha de Restauracion:</label>
					<input type="date" name="restorationDate" value="{{date("Y-m-j")}}">
				</div>
			</div>
			<div class="col-9">
				<div class="form-group">
					<label>Descripccion:</label>
					<textarea class="form-control" name="description">
					</textarea>
				</div>
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Agregar Restauracion">
		</div>
	</form>

</div>

@endsection

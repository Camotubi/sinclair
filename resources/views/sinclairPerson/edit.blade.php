@extends('layouts.app')

@section('title')
	Actualización de Familiar Sinclair
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Familiar Sinclair</h3>
				<form class=""  action= "/sinclairPerson/{{$sinclairPerson->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="firstname">Nombre:</label>
							<input class="form-control" type="text" name="firstname" value="{{$sinclairPerson->firstname}}">
						</div>
						<div class="form-group col-md-4">
							<label for="lastname">Apellido:</label>
							<input class="form-control" type="text" name="lastname" value="{{$sinclairPerson->lastname}}">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Cédula:</label>
							<input class="form-control" type="text" name="nin" value="{{$sinclairPerson->nin}}">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Tipo de Relaciones:</label>
							<input class="form-control" type="text" name="relationshipTypeId"
								value="{{$sinclairPerson->relationshipTypeId}}" list="relationshipTypes">
							<datalist id="relationshipTypes">
								@foreach($relationshipTypes as $relationshipType)
									<option value ="{{$relationshipType->id}}">
											{{$relationshipType->name}}</option>
								@endforeach
							</datalist>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

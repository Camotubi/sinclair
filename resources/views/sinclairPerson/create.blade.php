@extends('layouts.app')

@section('title')
	Registro de Familiar Sinclair
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Familiar Sinclair</h3>
				<form class=""  action= "/sinclairPerson" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="firstname">Nombre:</label>
							<input class="form-control" type="text" name="firstname" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="lastname">Apellido:</label>
							<input class="form-control" type="text" name="lastname" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Cédula:</label>
							<input class="form-control" type="text" name="nin" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="nin">Tipo de Relaciones:</label>
							<input class="form-control" type="text" name="relationshipTypeId"
								value="" list="relationshipTypes">
							<datalist id="relationshipTypes">
								@foreach($relationshipTypes as $relationshipType)
									<option value ="{{$relationshipType->id}}">
											{{$relationshipType->name}}</option>
								@endforeach
							</datalist>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

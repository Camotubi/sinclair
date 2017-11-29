@extends('layouts.app')

@section('title')
	Registro de Persona Relacionada a Sinclair
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Familiar Sinclair</h3>
				<form class=""  action= "/sinclairPerson" method="post">
					{{ csrf_field() }}
					<datalist id="relationshipTypes">
						@foreach($relationshipTypes as $relationshipType)
							<option value ="{{$relationshipType->id.'-'.$relationshipType->name}}">
						@endforeach
					</datalist>
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
							@for($i = 0; $i < $numRelationshipTypes; $i++)
							<div class="form-group">
								<input class="form-control" type="text" name="relationshipTypes[]"
									value="" list="relationshipTypes">
							</div>
							@endfor
							<a href="/sinclairPerson/create?numRelationshipTypes={{$numRelationshipTypes}}&modRelationshipTypeFields=p">Agregar</a>
							<a href="/sinclairPerson/create?numRelationshipTypes={{$numRelationshipTypes}}&modRelationshipTypeFields=m">Quitar</a>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

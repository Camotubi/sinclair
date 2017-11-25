@extends('layouts.app')

@section('title')
	Actualización de Memorabilia
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Memorabilia</h3>
				<form class="" action="/multimedia/{{$multimedia->id}}" method="post">
					<div class="form-row">
						<div class ="form-check">
							<label class="form-check-label">
								Memorabilia de Sinclair
								<input class="form-check-input" name="sinclairMemorability" type="checkbox" value="{{$multimedia->sinclairMemorability}}">
							</label>
						</div>
						<div class="form-group col-md-4">
							<label for="creationDate">Fecha de creación:</label>
							<input class="form-control" type="date" name="creationDate" value="{{$multimedia->creationDate}}">
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80">{{$multimedia->description}}</textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="fileLocation">Localización de la memorabilia:</label>
							<input class="form-control" type="text" name="fileLocation" value="{{$multimedia->fileLocation}}">
						</div>
						<div class="form-group col-md-4">
							<label for="multimediaTypeId">Tipo de Memorabilia:</label>
							//Falta ver como hacemos para mostrar la opcion que ya esta puesta por default
							<select class="form-control" name="multimediaTypeId">
								<option value="1">Foto</option>
								<option value="2">Video</option>
							</select>
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

@extends('layouts.app')

@section('title')
	Registro de Memorabilia
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Memorabilia</h3>
				<form class="" action="/multimedia" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class ="form-check">
							<label class="form-check-label">
								Memorabilia de Sinclair
								<input class="form-check-input" name="sinclairMemorability" type="checkbox" value="true">
							</label>
						</div>
						<div class="form-group col-md-4">
							<label for="creationDate">Fecha de creación:</label>
							<input class="form-control" type="date" name="creationDate" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80"></textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="fileLocation">Localización de la memorabilia:</label>
							<input class="form-control" type="text" name="fileLocation" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="multimediaTypeId">Tipo de Memorabilia:</label>
							<input type="text" class="form-control" name="multimediaTypeId" value="" list="multimediaTypes">
								<datalist id="multimediaTypes">
									@foreach($multimediaTypes as $multimediaType)
										<option value ="{{$multimediaType->id}}"> {{$multimediaType->name}}</option>
									@endforeach
								</datalist>
						</div>
					</div>
					<input type="submit" name="register" class="btn btn-primary" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

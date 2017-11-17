@extends('layouts.app')

@section('title')
	Registro de Estilo de Arte
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Estilo de Arte</h3>
				<form class=""  action= "/artStyle" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="">
						</div>
						<div class="form-group col-md-4">
							<label for="description">Descripción:</label>
							<textarea class="form-control" name="description" rows="8"
								cols="80"></textarea>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="register" value="Registrar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

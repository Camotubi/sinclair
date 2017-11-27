@extends('layouts.app')

@section('title')
	Actualización de Entidad Legal
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de entidad legal</h3>
				<form class=""  action= "/legalEntity/{{$legalEntity->id}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$legalEntity->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="address">Dirección:</label>
							<input class="form-control" type="text" name="address" value="{{$legalEntity->address}}">
						</div>
						<div class="form-group col-md-4">
							<label for="phone">Número Telefónico:</label>
							<input class="form-control" type="text" name="phone" value="{{$legalEntity->phone}}">
						</div>
						<div class="form-group col-md-4">
							<label for="email">Email:</label>
							<input class="form-control" type="email" name="email" value="{{$legalEntity->email}}">
						</div>
						<div class="form-group col-md-4">
							<label for="ruc">RUC:</label>
							<input class="form-control" type="text" name="ruc" value="{{$legalEntity->ruc}}">
						</div>
						<div class="form-group col-md-4">
							<label for="identificationNumber">Numero de Identificación:</label>
							<input class="form-control" type="number" name="identificationNumber" value="{{$legalEntity->identificationNumber}}">
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" name="philanthropy" type="checkbox" value="{{$legalEntity->philanthropy}}">
								Filantropía
							</label>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

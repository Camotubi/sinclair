@extends('layouts.app')

@section('title')
	Actualización de Aseguradora
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Aseguradora</h3>
				<form class=""  action= "/insuranceCarrier/{{$insuranceCarrier->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" value="{{$insuranceCarrier->name}}">
						</div>
						<div class="form-group col-md-4">
							<label for="phone">Número Telefónico:</label>
							<input class="form-control" type="text" name="phone" value="{{$insuranceCarrier->phone}}">
						</div>
						<div class="form-group col-md-4">
							<label for="email">Email:</label>
							<input class="form-control" type="email" name="email" value="{{$insuranceCarrier->email}}">
						</div>
						<div class="form-group col-md-4">
							<label for="ruc">RUC:</label>
							<input class="form-control" type="text" name="ruc" value="{{$insuranceCarrier->ruc}}">
						</div>
					</div>
					<input type="submit" class="btn btn-primary" name="update" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

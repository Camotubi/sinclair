
@extends('layouts.app')

@section('title')
@endsection

@section('content')

			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th >Nombre</th>
						<th >Tecnica</th>
						<th >Fecha</th>
						<th >Localizacion</th>
						<th >Acciones</th>

					</tr>
				</thead>
@foreach($artPieces as $artPiece)

	<td><a href="/artPiece/{{$artPiece->id}}">{{$artPiece->name}}</a></td>
					<td>{{$artPiece->technique}}</td>
					<td>{{$artPiece->currentLocation}}</td>
					<td>{{$artPiece->creationDate}}</td>
					<td>
						<a href="/artPiece/{{$artPiece->id}}">
							<i class="fa fa-object-ungroup" aria-hidden="true"></i>Ver
						</a>
						|
						<a href="/artPiece/{{$artPiece->id}}/edit">
							<i style="color:#138496" class="fa fa-pencil" aria-hidden="true"></i>Modificar
						</a>
						|
						<a href="/artPiece/{{$artPiece->id}}/delete'">
							<i style="color:red" class="fa fa-trash" aria-hidden="true"></i>Eliminar
						</a>
					</td>
				</tr>
			</table>
	

@endforeach
@endsection

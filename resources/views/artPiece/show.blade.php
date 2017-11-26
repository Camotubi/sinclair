@extends('layouts.app')

@section('title')

@endsection

@section('content')

<h1>{{$artPiece->name}}</h1>

@isset($artPiece->technique)
<h3>{{$artPiece->technique}}</h3>
@endisset
@foreach($artPiece->artStyles as $artStyle)

artStyles
<h3>{{$artStyle}}</h3>
@endforeach

Restauraciones
<table>
	<thead>
		<th>Restaurador</th>
		<th>Fecha</th>
	</thead>
	@foreach($artPiece->legalEntityRestoration() as $restoration)
		<tr>
			{{$restoration->legalEntityId}}
		</tr>
		<tr>
			{{$restoration->restorationDate}}
		</tr>
	@endforeach
</table>

<div>
<ul>
	@foreach($artPiece->multimedia as $image)
	<li>
		<img src='{{ asset("storage/".$image->fileLocation)}} '>
	</li>
@endforeach
</ul>
<a href="/artPiece/{{$artPiece->id}}/addImage">Agregar Imagen</a>
</div>
@endsection

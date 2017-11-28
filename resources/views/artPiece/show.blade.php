@extends('layouts.app')

@section('title')
{{$artPiece->name}} - Detalles
@endsection

@section('content')

<h1>{{$artPiece->name}}</h1>

<br>

<h3>Detalles</h3>

<h5>Análisis Crítico</h5>
<p>{{$artPiece->criticalAnalisis}}</p>
<hr>

<h5>Era</h5>
<p>{{$artPiece->era}}</p>
<hr>

@isset($artPiece->technique)
<h5>Técnica</h5>
<p>{{$artPiece->technique}}</p>
@endisset
<hr>

<h5>Estilos</h5>
@foreach($artPiece->artStyles as $artStyle)
<p>{{$artStyle->name}}</p>
@endforeach
<hr>

<h5>Localización Actual</h5>
<p>{{$artPiece->currentLocation}}</p>
<hr>

<h5>Donado por:</h5>
<p>{{$donator->name}}</p>
<hr>

<h3>Restauraciones</h3>
<restorations-table obj_id={{$artPiece->id}}></restorations-table>
<br>

<h3>Imagenes</h3>
<div>
<images-table obj_id={{$artPiece->id}}></images-table>
<a href="/artPiece/{{$artPiece->id}}/addImage">Agregar Imagen</a>
</div>
<br>
<a href="/artPiece/{{$artPiece->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/artPiece/{{$artPiece->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

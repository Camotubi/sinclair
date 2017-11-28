@extends('layouts.app')

@section('title')
{{$exhibition->name}} - Detalles
@endsection

@section('content')
<h1>{{$exhibition->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Fecha</h5>
<p>{{$exhibition->date}}</p>
<hr>

<h5>Ubicación</h5>
<p>{{$exhibition->location}}</p>
<hr>
@isset($artPieces)
<h5>Obras de arte exhibidas</h5>
@foreach($artPieces as $artPiece)
<p>{{$artPiece->name}}</p>
@endforeach
<hr>
@endisset

@isset($organizers)
<h5>Organizadores</h5>
@foreach($organizers as $organizers)
<p>{{$organizers->name}}</p>
@endforeach
<br>
@endisset

<a href="/exhibition/{{$exhibition->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/exhibition/{{$exhibition->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

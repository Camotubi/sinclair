@extends('layouts.app')

@section('title')
Visita del dia {{$visit->date}} - Detalles
@endsection

@section('content')
<h1>Visita del dia {{$visit->date}}</h1>

<h3>Visitante</h3>
<p>{{$visitor->fisrtName.' '.$visitor->lastName}}</p>

<a href="/visit/{{$visit->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/visit/{{$visit->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
@endsection

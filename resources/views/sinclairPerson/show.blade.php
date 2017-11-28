@extends('layouts.app')

@section('title')
{{$sinclairPerson->firstName}} {{$sinclairPerson->lastName}} - Detalles
@endsection

@section('content')
<h1>{{$sinclairPerson->firstName}} {{$sinclairPerson->lastName}}</h1>
<br>

<h3>Detalles</h3>

<h5>Cedula</h5>
<p>{{$sinclairPerson->nin}}</p>
<hr>

<h5>Relación con Sinclair</h5>
@foreach($relationshipTypes as $relationshipType)
<p>{{$relationshipType->name}}</p>
@endforeach
<br>

<a href="/sinclairPerson/{{$sinclairPerson->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/sinclairPerson/{{$sinclairPerson->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

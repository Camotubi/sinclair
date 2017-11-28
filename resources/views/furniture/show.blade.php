@extends('layouts.app')

@section('title')
{{$furniture->name}} - Detalles
@endsection

@section('content')
<h1>{{$furniture->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Tipo de inmobiliario</h5>
<p>{{$furnitureType->name}}</p>


@if($furniture->donatorId == null)
@else
<hr>
<h5>Donado por:</h5>
<p>{{$donator->name}}</p>
@endif
<br>

<a href="/furniture/{{$furniture->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/furniture/{{$furniture->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

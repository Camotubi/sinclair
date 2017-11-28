@extends('layouts.app')

@section('title')
{{$insurance->name}} - Detalles
@endsection

@section('content')
<h1>{{$insurance->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Obra</h5>
<p>{{artPiece->name}}</p>
<hr>

<h5>Aseguradora</h5>
<p>{{insuranceCarrier->name}}</p>
<hr>

<h5>Descripción</h5>
<p>{{$insurance->description}}</p>
<hr>

<h5>Costo</h5>
<p>{{$insurance->cost}}</p>
<hr>

<h5>Fecha de efectividad</h5>
<p>{{$insurance->effectiveDate}}</p>
<hr>

<h5>Fecha de terminación</h5>
<p>{{$insurance->terminationDate}}</p>
<br>

<a href="/insurance/{{$insurance->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/insurance/{{$insurance->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

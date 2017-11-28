@extends('layouts.app')

@section('title')
{{$legalEntity->name}}
@endsection

@section('content')
<h1>{{$legalEntity->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Email</h5>
<p>{{$legalEntity->email}}</p>
<hr>

<h5>Número de telefono</h5>
<p>{{$legalEntity->phone}}</p>
<hr>

<h5>Dirección</h5>
<p>{{$legalEntity->address}}</p>
<hr>

<h5>RUC</h5>
<p>{{$legalEntity->ruc}}</p>
<hr>

<h5>Número de identificación</h5>
<p>{{$legalEntity->identificationNumber}}</p>
<hr>

<h5>Entidad Filantrópica?</h5>
@if($legalEntity->philanthropy == 1)
<p>Sí</p>
@else
<p>No</p>
@endif
<br>

<a href="/legalEntity/{{$legalEntity->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/legalEntity/{{$legalEntity->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

@extends('layouts.app')

@section('title')
{{$insuranceCarrier->name}} - Detalles
@endsection

@section('content')
<h1>{{$insuranceCarrier->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Número de telefono</h5>
<p>{{insuranceCarrier->phone}}</p>
<hr>

<h5>Email</h5>
<p>{{insuranceCarrier->email}}</p>
<hr>

<h5>RUC</h5>
<p>{{insuranceCarrier->ruc}}</p>
<br>

<a href="/insuranceCarrier/{{$insuranceCarrier->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/insuranceCarrier/{{$insuranceCarrier->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

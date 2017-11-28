@extends('layouts.app')

@section('title')
Alquiler de {{$artPiece->name}} - Detalles
@endsection

@section('content')
<h1>Alquiler de {{$artPiece->name}}</h1>
<br>

<h3>Detalles</h3>

<h5>Alquilada por:</h5>
<p>{{$legalEntity->name}}</p>
<hr>

<h5>Descripción</h5>
<p>{{$rent->description}}</p>
<hr>

<h5>Cantidad de dinero</h5>
<p>{{$rent->moneyQuantity}}</p>
<hr>

<h5>Fecha de efectividad</h5>
<p>{{$rent->effectiveDate}}</p>
<hr>

<h5>Fecha de terminación</h5>
<p>{{$rent->terminationDate}}</p>
<br>

<a href="/rent/{{$rent->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/rent/{{$rent->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

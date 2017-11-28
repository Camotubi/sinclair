@extends('layouts.app')

@section('title')
{{$condecoration->name}} - Detalles
@endsection

@section('content')
<h1>{{$condecoration->name}}</h1>
<br>

<h3>Detalles</h3>
<h5>Descripción</h5>
<p>{{$condecoration->description}}</p>
<hr>

<h5>Fecha de la condecoración</h5>
<p>{{$condecoration->date}}</p>
<hr>

<h5>Dada por:</h5>
<p>{{$condecorator->name}}</p>
<br>
<a href="/condecoration/{{$condecoration->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/condecoration/{{$condecoration->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

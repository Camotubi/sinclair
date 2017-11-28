@extends('layouts.app')

@section('title')
{{$artStyle->name}} - Detalles
@endsection

@section('content')
<h1>{{$artStyle->name}}</h1>
<br>

<h3>Descripción</h3>
<p>{{$artStyle->description}}</p>
<br>

<a href="/artStyle/{{$artStyle->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/artStyle/{{$artStyle->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

@extends('layouts.app')

@section('title')
{{$publication->title}} - Detalles
@endsection

@section('content')
<h1>{{$publication->title}}</h1>
<br>

<h3>Detalles</h3>

<h5>Contenido</h5>
<p>{{$publication->body}}</p>
<hr>

<h5>Publicado por:</h5>
<p>{{$user->firstName}} {{$user->lastName}}</p>
<br>

<a href="/publication/{{$publication->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/publication/{{$publication->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

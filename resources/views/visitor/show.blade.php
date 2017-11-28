@extends('layouts.app')

@section('title')
{{$visitor->firstName}} {{$visitor->lastName}} - Detalles
@endsection

@section('content')
<h1>{{$visitor->firstName}} {{$visitor->lastName}}</h1>
<br>

<h5>Cédula</h5>
<p>{{$visitor->nin}}</p>
<br>

<a href="/visitor/{{$visitor->id}}/edit" class="btn btn-info">
  <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
</a>
<a href="/visitor/{{$visitor->id}}/delete" class="btn btn-danger">
   <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
</a>
@endsection

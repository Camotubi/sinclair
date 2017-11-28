@extends('layouts.app')

@section('title')
{{$multimedia->name}} - Detalles
@endsection

@section('content')
 <h1>{{$multimedia->name}}</h1>
 <br>

 <h3>Detalles</h3>

 <h5>Tipo de memorabilia</h5>
 <p>{{$multimediaType->name}}</p>
 <hr>

 <h5>Descripción</h5>
 <p>{{$multimedia->description}}</p>
 <hr>

 <h5>Es memorabilia de Sinclair?</h5>
 @if($multimedia->sinclairMemorability == 1)
 <p>Sí</p>
 @else
 <p>No</p>
 @endif
 <hr>

 <h5>Fecha de creación</h5>
 <p>{{$multimedia->creationDate}}</p>
 <hr>

 <h5>Ubicación de archivo</h5>
 <p>{{$multimedia->fileLocation}}</p>
 <br>

 <a href="/multimedia/{{$multimedia->id}}/edit" class="btn btn-info">
   <i class="fa fa-pencil" aria-hidden="true"></i> Modificar
 </a>
 <a href="/multimedia/{{$multimedia->id}}/delete" class="btn btn-danger">
    <i  class="fa fa-trash" aria-hidden="true"></i> Eliminar
 </a>
@endsection

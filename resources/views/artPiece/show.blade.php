@extends('layouts.app')

@section('title')

@endsection

@section('content')

<h1>{{$artPiece->name}}</h1>

@isset($artPiece->technique)
<h3>{{$artPiece->technique}}</h3>
@endisset
@foreach($artPiece->artStyles as $artStyle)

artStyles
<h3>{{$artStyle->name}}</h3>
<p>{{$artStyle->description}}</p>
@endforeach


<div>
<a href="/artPiece/{{$artPiece->id}}/addImage">Agregar Imagen</a>
<images-table obj_id={{$artPiece->id}}></images-table>
</div>
Restauraciones
<restorations-table obj_id={{$artPiece->id}}></restorations-table>
@endsection

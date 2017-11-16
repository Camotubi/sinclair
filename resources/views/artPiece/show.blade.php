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
<h3>{{$artStyle}}</h3>
@endforeach
@endsection

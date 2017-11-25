@extends('layouts.app')

@section('title')
Condecoración
@endsection

@section('content')
@foreach( $condecorations as $condecoration )
  <a href="/condecoration/show/{{@$condecoration->id}}">
    <h4>{{ @$condecoration->name }}</h4>
  </a>
  @endforeach
{{$condecorations->links()}}
@endsection

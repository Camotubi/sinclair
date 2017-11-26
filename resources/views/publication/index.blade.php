@extends('layouts.app')

@section('title')
Publicaciones
@endsection

@section('content')
@foreach( $publications as $publication )
  <a href="/publication/show/{{@$publication->id}}">
    <h4>{{ @$publication->name }}</h4>
  </a>
  @endforeach
{{$publications->links()}}
@endsection

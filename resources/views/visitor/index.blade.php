@extends('layouts.app')

@section('title')
Visitantes
@endsection

@section('content')
@foreach( $visitors as $visitor )
  <a href="/visitor/{{@$visitor->id}}">
    <h4>{{ @$visitor->name }}</h4>
  </a>
  @endforeach
{{$visitors->links()}}
@endsection

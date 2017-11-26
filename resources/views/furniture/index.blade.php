@extends('layouts.app')

@section('title')
Inmobiliario
@endsection

@section('content')
@foreach( $furnitures as $furniture )
  <a href="/furniture/{{@$furniture->id}}">
    <h4>{{ @$furniture->name }}</h4>
  </a>
  @endforeach
{{$furnitures->links()}}
@endsection

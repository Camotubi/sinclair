@extends('layouts.app')

@section('title')
Visitas
@endsection

@section('content')
@foreach( $visits as $visit )
  <a href="/visit/show/{{@$visit->id}}">
    <h4>{{ @$visit->name }}</h4>
  </a>
  @endforeach
{{$visits->links()}}
@endsection

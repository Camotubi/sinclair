@extends('layouts.app')

@section('title')
Alquileres
@endsection

@section('content')
@foreach( $rents as $rent )
  <a href="/rent/show/{{@$rent->id}}">
    <h4>{{ @$rent->name }}</h4>
  </a>
  @endforeach
{{$rents->links()}}
@endsection

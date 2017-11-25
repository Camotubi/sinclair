@extends('layouts.app')

@section('title')
Exhibición
@endsection

@section('content')
@foreach( $exhibitions as $exhibition )
  <a href="/exhibition/show/{{@$exhibition->id}}">
    <h4>{{ @$exhibition->name }}</h4>
  </a>
  @endforeach
{{$exhibitions->links()}}
@endsection

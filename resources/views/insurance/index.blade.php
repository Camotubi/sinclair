@extends('layouts.app')

@section('title')
Seguros
@endsection

@section('content')
@foreach( $insurances as $insurance )
  <a href="/insurance/{{@$insurance->id}}">
    <h4>{{ @$insurance->name }}</h4>
  </a>
  @endforeach
{{$insurances->links()}}
@endsection

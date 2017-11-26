@extends('layouts.app')

@section('title')
Memorabilia
@endsection

@section('content')
@foreach( $multimedias as $multimedia )
  <a href="/multimedia/{{@$multimedia->id}}">
    <h4>{{ @$multimedia->name }}</h4>
  </a>
  @endforeach
{{$multimedias->links()}}
@endsection

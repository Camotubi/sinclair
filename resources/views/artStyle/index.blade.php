@extends('layouts.app')

@section('title')

@endsection

@section('content')
  @foreach( $artStyles as $artStyle )
    <a href="/artStyle/show/{{@$artStyle->id}}">
      <h4>{{ @$artStyle->name }}</h4>
    </a>
    @endforeach
  {{$artStyles->links()}}
@endsection

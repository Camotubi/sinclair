@extends('layouts.app')

@section('title')
Etiquetas
@endsection

@section('content')
@foreach( $tags as $tag )
  <a href="/tag/{{@$tag->id}}">
    <h4>{{ @$tag->name }}</h4>
  </a>
  @endforeach
{{$tags->links()}}
@endsection

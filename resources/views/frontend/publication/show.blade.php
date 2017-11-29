@extends('layouts.frontend.main')

@section('title')
{{$publication->title}}
@endsection

@section('content')
<h1>{{$publication->title}}</h1>
<hr>
<br>
<article class="">
  <p>{!!$publication->body!!}</p>
</article>
<br>
<hr>
<h4>Publicado por:</h4>
<p>{{$publication->user->firstName.' '.$publication->user->lastName}}</p>
<br>
<h4>Etiquetas:</h4>
@foreach($tags as $tag)
<p>{{$tag->tag}}</p>
@endforeach
@endsection

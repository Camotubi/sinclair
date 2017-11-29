@extends('layouts.frontend.main')

@section('title')
Publicaciones
@endsection

@section('content')
@foreach($publications as $publication)
<a href="/f/publication/show/{{ $publication->id }}">
  <h4>{{ $publication->title }}</h4>
</a>
@endforeach
{{$publications->links()}}
@endsection

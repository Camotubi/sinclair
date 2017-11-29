@extends('layouts.frontend.main')

@section('title')
Publicaciones
@endsection

@section('content')
@foreach($publications as $publication)
<div class="post">
<a href="/f/publication/show/{{ $publication->id }}">
  <h4>{{ $publication->title }}</h4>
</a>
</div>
@endforeach
{{$publications->links()}}
@endsection

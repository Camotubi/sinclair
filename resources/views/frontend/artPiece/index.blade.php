@extends('layouts.frontend.main')

@section('title')
	Galeria
@endsection

@section('content')
@for($i = 0 ; $i < count($artPieces) ; $i++)
<div class="row">
  @for($x=0 ; ($x+1)%4 != 0 ; $x++)
@php
$artPiece = $artPieces[$x]
@endphp
  <div class="col-sm">
    <a href="/f/artPiece/show/{{$artPiece->name}}" class="thumbnail">
      <img class ="img-thumbnail" src="/img/thumbnail.jpg">
      <div class="caption">
        <h3>{{$artPiece->name}}</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse ut un
          de, excepturi ipsum molestiae, quia atque sunt officiis ab delectus totam adipisci vel doloremque ea odit itaque vero iusto placeat.</p>
      </div>
    </a>
  </div>
  @endfor
</div>
@endfor
{{$artPieces->links()}}
<div>

	</div>
@endsection

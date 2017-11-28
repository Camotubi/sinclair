@extends('layouts.frontend.main')

@section('title')
	Galeria
@endsection

@section('content')
@php
$a = 0
@endphp
@for($i = 0 ; $i < (count($artPieces)/3) ; $i++)
<div class="row">
  @for($x=0 ; ($x+1)%4 != 0 ; $x++)
@php
$artPiece = $artPieces[$a];
@endphp
  <div class="col-sm">
	  <div stlye=" display: flex;flex-direction: column;justify-content: space-between;">
		  <div>
    <a href="/f/artPiece/show/{{@$artPiece->id}}" class="thumbnail">

@isset($artPiece->multimedia()->first()->fileLocation)

      <img class ="img-thumbnail gallery" src="/storage/{{$artPiece->multimedia()->first()->fileLocation}}">
@else
      <img class ="img-thumbnail gallery" src="/img/thumbnail.jpg">
@endisset


    </a>
    </div>
      <div class="caption">
    <a href="/f/artPiece/show/{{@$artPiece->id}}" class="thumbnail">
        <h3>{{@$artPiece->name}}</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse ut un
          de, excepturi ipsum molestiae, quia atque sunt officiis ab delectus totam adipisci vel doloremque ea odit itaque vero iusto placeat.</p>
  </a>
      </div>
  </div>
  </div>
	@php
	$a++
	@endphp
  @endfor
</div>
@endfor
{{$artPieces->links()}}
<div>

	</div>
@endsection

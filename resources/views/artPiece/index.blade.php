@extends('layouts.app')

@section('title')
Index
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
    <a href="artPiece/show/{{@$artPiece->id}}" class="thumbnail">
      <img class ="img-thumbnail" src="/img/thumbnail.jpg">
      <div class="caption">
        <h3>{{@$artPiece->name}}</h3>
      </div>
    </a>
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

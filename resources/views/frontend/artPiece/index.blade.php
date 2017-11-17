@extends('layouts.frontend.main')

@section('title')
	Galeria
@endsection

@section('content')
@foreach($artPiece as $artpiece)
<div class="row">
  @foreach($artPiece as $artpiece)
  <div class="col-md-3">
    <a href="/f/artPiece/show/{{$artpiece->name}}" class="thumbnail">
      <img src="/img/thumbnail.jpg">
      <div class="caption">
        <h3>{{$artpiece->name}}</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse ut un
          de, excepturi ipsum molestiae, quia atque sunt officiis ab delectus totam adipisci vel doloremque ea odit itaque vero iusto placeat.</p>
      </div>
    </a>
  </div>
  @endforeach
</div>
@endforeach
<div>

	</div>
@endsection

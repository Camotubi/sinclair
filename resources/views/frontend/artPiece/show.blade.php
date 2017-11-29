@extends('layouts.frontend.main')

@section('title')
	Mostrar Obra de arte
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h1>{{$artPiece->name}}</h1>
				<hr>
				<br>
				@isset($artPiece->multimedia()->first()->fileLocation)
				<img src="{{"/storage/".$artPiece->multimedia()->first()->fileLocation}}">
				@endisset
				<p>
				<b>Técnica:</b> {{$artPiece->technique}}
				<br>
				<b>Fecha:</b> {{$artPiece->created_at}}
				<br>
				<b>Analisis Crítico</b>
				<br>
				{{$artPiece->criticalAnalisis}}
				</p>
				@if(count($artPiece->multimedia) > 0)
				<div class ="container">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($artPiece->multimedia as $image)
								@if($loop->first)
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration-1}}" class ="active"></li>
								@else
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration-1}}" ></li>
								@endif
							@endforeach
						</ol>
					<div class ="carousel-inner">
						@foreach($artPiece->multimedia as $image)
							@if($loop->first)
								<div class = "carousel-item active">
							@else
								<div class = "carousel-item">
									@endif
							<img class="d-block img-fluid" src='{{ asset("storage/".$image->fileLocation)}} '>
							<div class = "carousel-caption d-none d-md-block">
							</div>
							</div>
								@endforeach
								</div>
							</div>
				</div>
				@endif
			</article>
		</section>
	</div>

	</div>
@endsection

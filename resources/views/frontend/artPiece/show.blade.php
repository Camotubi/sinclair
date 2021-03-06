@extends('layouts.frontend.main')

@section('title')
	{{$artPiece->name}}
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
				<div style ="width:100%; text-align:center;" class ="container">
					<div style="display:inline-block;"id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($artPiece->multimedia as $image)
								@if($loop->first)
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration-1}}" class ="active"></li>
								@else
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration-1}}" ></li>
								@endif
							@endforeach
						</ol>
					<div style= "display:inline-block;" class ="carousel-inner">
						@foreach($artPiece->multimedia as $image)
							@if($loop->first)
								<div class = "carousel-item active">
							@else
								<div class = "carousel-item">
									@endif
							<img class="d-block img-fluid" style="height:400px;"; src='{{ asset("storage/".$image->fileLocation)}} '>
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

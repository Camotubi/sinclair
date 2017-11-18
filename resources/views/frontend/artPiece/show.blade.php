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
				<p>
				<b>Técnica:</b> {{$artPiece->technique}}
				<br>
				<b>Fecha:</b> {{$artPiece->created_at}}
				<br>
				<b>Analisis Crítico</b>
				<br>
				{{$artPiece->criticalAnalisis}}
				</p>
			</article>
		</section>
	</div>

	</div>
@endsection


@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Esta seguro que desea eliminar la restauración de la obra
		<strong>"{{$artPiece->name}}"</strong> hecha por
		<strong>"{{$legalEntity->name}}"</strong> del sistema?</p>
</div>
<form action="/artPiece/restoration/{{$restoration->id}}/delete" method="post">
	{{csrf_field()}}
	<input type="submit" class="btn btn-danger" value="Eliminar Restauración" >
</form>
</div>
@endsection

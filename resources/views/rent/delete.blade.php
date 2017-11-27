
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Esta seguro que desea eliminar el alquiler de la obra
		<strong>"{{$artPiece->name}}"</strong> hecha por
		<strong>"{{$legalEntity->name}}"</strong> del sistema?</p>
</div>
<form action="/rent/{{$rent->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Alquiler" >
</form>
</div>
@endsection

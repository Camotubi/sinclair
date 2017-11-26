
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Desea realmente elminiar la pieza de arte <strong>{{$artPiece->name}}</strong> del sistema?</p>
</div>
<form action="/artPiece/{{$artPiece->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Pieza de Arte" >
</form>
</div>
@endsection


@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Esta seguro que desea eliminar al Visitante <strong>"{{$visitor->name}}"</strong> del sistema?</p>
</div>
<form action="/visitor/{{$visitor->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Visitante" >
</form>
</div>
@endsection

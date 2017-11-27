
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">"
	<p> Esta seguro que desea eliminar la visita hecha por
		<strong>"{{$visitor->name}}"</strong> el dia
		<strong>"{{$visit->date}}"</strong> del sistema?</p>
</div>
<form action="/visit/{{$visit->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Visita" >
</form>
</div>
@endsection

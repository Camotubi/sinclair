
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Esta seguro que desea eliminar el seguro <strong>"{{$insurance->name}}"</strong>
			para la obra <strong>"{{$artPiece->name}}"</strong>
			hecha por la aseguradora <strong>"{{$insuranceCarrier->name}}"</strong> del sistema?</p>
</div>
<form action="/insurance/{{$insurance->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Seguro" >
</form>
</div>
@endsection

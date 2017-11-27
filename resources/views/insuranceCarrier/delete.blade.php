
@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div id = "deleteConfirmation">
<div class="alert alert-danger" role="alert">
	<p> Esta seguro que desea eliminar la aseguradora <strong>"{{$insuranceCarrier->name}}"</strong> del sistema?</p>
</div>
<form action="/insuranceCarrier/{{$insuranceCarrier->id}}" method="post">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">
	<input type="submit" class="btn btn-danger" value="Eliminar Aseguradora" >
</form>
</div>
@endsection

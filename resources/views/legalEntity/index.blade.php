@extends('layouts.app')

@section('title')
Entidades Legales
@endsection

@section('content')
@foreach( $legalEntities as $legalEntity )
  <a href="/legalEntity/{{@$legalEntity->id}}">
    <h4>{{ @$legalEntity->name }}</h4>
  </a>
  @endforeach
{{$legalEntities->links()}}
@endsection

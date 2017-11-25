@extends('layouts.app')

@section('title')
Personas Relacionadas a Sinclair
@endsection

@section('content')
@foreach( $sinclairPersons as $sinclairPerson )
  <a href="/sinclairPersons/show/{{@$sinclairPerson->id}}">
    <h4>{{ @$sinclairPerson->name }}</h4>
  </a>
  @endforeach
{{$sinclairPersons->links()}}
@endsection

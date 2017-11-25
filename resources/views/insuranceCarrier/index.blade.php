@extends('layouts.app')

@section('title')

@endsection

@section('content')
@foreach( $insuranceCarriers as $insuranceCarrier )
  <a href="/insuranceCarrier/show/{{@$insuranceCarrier->id}}">
    <h4>{{ @$insuranceCarrier->name }}</h4>
  </a>
  @endforeach
{{$insuranceCarriers->links()}}
@endsection

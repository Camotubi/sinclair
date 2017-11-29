@extends('layouts.app')

@section('title')
Inmobiliario
@endsection

@section('content')
<div class="container">
  <furniture-table :show_name="true"></furniture-table>
</div>
@endsection

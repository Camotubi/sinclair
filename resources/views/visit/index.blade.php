@extends('layouts.app')

@section('title')
Visitas
@endsection

@section('content')
<div class="container">
  <visit-table :show_name="true"></visit-table>
</div>
@endsection

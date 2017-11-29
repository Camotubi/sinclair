@extends('layouts.app')

@section('title')
Visitantes
@endsection

@section('content')
<div class="container">
  <visitor-table :show_name="true"></visitor-table>
</div>
@endsection

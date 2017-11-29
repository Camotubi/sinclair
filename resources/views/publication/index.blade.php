@extends('layouts.app')

@section('title')
Publicaciones
@endsection

@section('content')
<div class="container">
  <publication-table :show_name="true"></publication-table>
</div>
@endsection

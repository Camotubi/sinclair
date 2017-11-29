@extends('layouts.app')

@section('title')
Etiquetas
@endsection

@section('content')
<div class="container">
  <tag-table :show_name="true"></tag-table>
</div>
@endsection

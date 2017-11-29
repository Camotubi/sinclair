@extends('layouts.app')

@section('title')
Condecoración
@endsection

@section('content')
<div class="container">
  <condecoration-table :show_name="true"></condecoration-table>
</div>
@endsection

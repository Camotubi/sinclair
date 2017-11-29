@extends('layouts.app')

@section('title')
Personas Relacionadas a Sinclair
@endsection

@section('content')
<div class="container">
  <sinclair-person-table :show_name="true"></sinclair-person-table>
</div>
@endsection

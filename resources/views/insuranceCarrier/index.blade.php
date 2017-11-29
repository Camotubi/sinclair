@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div class="container">
  <insurance-carrier-table :show_name="true"></insurance-carrier-table>
</div>
@endsection

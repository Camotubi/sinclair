@extends('layouts.app')

@section('title')

@endsection

@section('content')
	<div class="container">
		<art-piece-table :show_name="true"></art-piece-table>
	</div>
@endsection

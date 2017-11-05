@extends('layouts.app')
@section('content')
<div id="app">
	<h1> @{{ message }} </h1>
	<input v-model="message">
</div>

<script>
	new Vue({
		el:'#app',
			data: {
			message: 'Hello World'

		}
});

</script>
@endsection



@extends('layouts.app')
@section('content')
	<div id="app">
		<div class ="form-group">
			<label for="filterSelect">Filtro:</label>
			<select class ="form-control" v-model="filter" id="filterSelect">
				<option value = "artPieces">Obras</option>
				<option value = "People">Personas</option>
			</select>
		</div>
		<div v-show="filter == 'artPieces'">
			<form v-on:submit.prevent="executeQuery">
				<div class="row">
					<div class="col">
						<label for="inputBeginningDate">Desde:</label>
						<input class ="form-control" type="date" id="inputBeginningDate">
					</div>
					<div class="col">
						<label for="inputBeginningDate">Hasta:</label>
						<input class ="form-control" type="date">
					</div>
					<input type="submit">	
				</div>
			</form>	
		</div>
		<div v-show="filter == 'People'">
			<form>
				<div class="form-row">
					<div class="col">
						<input class ="form-control" type="text">
						<input class ="form-control" type="text">
					</div>	
				</div>
			</form>	
		</div>

		<table>
			<tr>
				<th>
					ID
				</th>
				<th>
					Nombre
				</th>
			</tr>
			<template v-for="item in items">
				<tr>
					<td>
						@{{item.id}}
					</td>

					<td>
						@{{item.name}}
					</td>
				</tr>
			</template>
		</table>

		<pre>
@{{$data}}
		</pre>
	</div>


	<script>
new Vue({
	el:'#app',
	data: {
		filter: '',
		items:[]


	},
	computed: {
		showMe: function() {
			switch(this.filter)
			{
				case 'artPieces':
					return 'artPieces';
					break;
				case 'People':
					return 'People';
					break;
			}
		}
	},
	methods:{

		executeQuery: function() {
			var self = this;	
			axios.get('/testAxios').then(
				function(response){
					self.items = response.data;
				})

		}
	}
});

	</script>
@endsection


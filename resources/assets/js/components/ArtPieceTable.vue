<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_name">Nombre</th>
						<th v-if="show_technique">Tecnica</th>
						<th v-if="show_current_location">Localizacion</th>
						<th v-if="show_links">Acciones</th>

					</tr>
				</thead>
				<tr v-for="artPiece in laravelData.data">

					<td v-if="show_name" ><a :href="'/artPiece/' +artPiece.id">{{artPiece.name}}</a></td>
					<td v-if="show_technique" v-text="artPiece.technique"></td>
					<td v-if="show_current_location" v-text="artPiece.currentLocation"></td>
					<td v-if="show_links"><a :href="'/artPiece/'+artPiece.id+'/show'"><i class="fa fa-pencil" aria-hidden="true"></i>
Modificar</a>|<a :href="'/artPiece/'+artPiece.id+'/delete'"><i style="color:red" class="fa fa-trash" aria-hidden="true"></i>
Eliminar</a></td>
				</tr>
			</table>
		</ul>
		<pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination>
	</div>

</template>
<script>
export default {
	data() {
		return {
			// Our data object that holds the Laravel paginator data
			laravelData: {},
		}
	},
	props:{
		show_name:{default:true},
		show_technique:{default:true},
		show_current_location:{default:true},
		page_amount:{default:10},
		show_links:{default:true},

	},


	created() {
		// Fetch initial results
		this.getResults();
	},

	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page) {
			var self = this
			if (typeof page === 'undefined') {
				page = 1;
			}

			// Using vue-resource as an example
			axios.get('api/artPiece/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>

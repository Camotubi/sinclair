
<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_name">Nombre</th>
						<th v-if="show_date">Fecha</th>
						<th v-if="show_location">Lugar</th>
						<th v-if="show_links">Acciones</th>

					</tr>
				</thead>
				<tr v-for="exhibition in laravelData.data">
					<td v-if="show_name" ><a :href="'/exhibition/' +exhibition.id">{{exhibition.name}}</a></td>
					<td v-if="show_date" v-text="exhibition.date"></td>
					<td v-if="show_location" v-text="exhibition.location"></td>
					<td v-if="show_links">
						<a :href="'/exhibition/'+exhibition.id">
							<i class="fa fa-object-ungroup" aria-hidden="true"></i>Ver
						</a>
						|
						<a :href="'/exhibition/'+exhibition.id+'/edit'">
							<i style="color:#138496" class="fa fa-pencil" aria-hidden="true"></i>Modificar
						</a>
						|
						<a :href="'/artPiece/'+exhibition.id+'/delete'">
							<i style="color:red" class="fa fa-trash" aria-hidden="true"></i>Eliminar
						</a>
					</td>
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
		show_date:{default:true},
		show_location:{default:true},
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
			axios.get('/api/exhibition/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>

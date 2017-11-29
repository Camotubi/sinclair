
<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th>Nombre</th>
						<th>Fecha Efectiva</th>
						<th>Fecha Terminal</th>
						<th>Costo</th>
						<th>Acciones</th>

					</tr>
				</thead>
				<tr v-for="insurance in laravelData.data">

					<td><a :href="'/insurance/' +insurance.id">{{insurance.name}}</a></td>
					<td>{{insurance.effectiveDate}}</td>
					<td>{{insurance.terminationDate}}</td>
					<td>{{insurance.cost}}</td>
					<td>
						<a :href="'/insurance/'+insurance.id">
							<i class="fa fa-object-ungroup" aria-hidden="true"></i>Ver
						</a>
						|
						<a :href="'/insurance/'+insurance.id+'/edit'">
							<i style="color:#138496" class="fa fa-pencil" aria-hidden="true"></i>Modificar
						</a>
						|
						<a :href="'/insurance/'+insurance.id+'/delete'">
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
		page_amount:{default:10},
		show_links:{default:true},
		obj_id:{default:0},

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
			axios.get('/api/artPiece/'+self.obj_id+'/insurance/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>

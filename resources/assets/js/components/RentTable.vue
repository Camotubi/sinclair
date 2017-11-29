<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_rent_effective_date">Fecha efectiva</th>
						<th v-if="show_rent_termination_date">Fecha de Terminacion</th>
						<th v-if="show_money">Monto</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tr v-for="rent in laravelData.data">

					<td  v-text="rent.effectiveDate"></td>
					<td v-if="show_rent_termination_date" v-text="rent.terminationDate"></td>
					<td v-if="show_money" v-text="rent.moneyQuantity"></td>
					<td>
						<a :href="'/rent/'+rent.id">
							<i class="fa fa-object-ungroup" aria-hidden="true"></i>Ver
						</a>
						|
						<a :href="'/rent/'+rent.id+'/edit'">
							<i style="color:#138496" class="fa fa-pencil" aria-hidden="true"></i>Modificar
						</a>
						|
						<a :href="'/rent/'+rent.id+'/delete'">
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
		show_rent_effective_date:{default:true},
		show_rent_termination_date:{default:true},
		show_current_location:{default:true},
		show_money:{default:true},
		page_amount:{default:10},
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
			axios.get('/api/artPiece/'+self.obj_id+'/rents/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>

<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_artpiece_name">Nombre</th>
						<th v-if="show_rent_effective_date">Tecnica</th>
						<th v-if="show_rent_termination_date">Localizacion</th>
						<th v-if="show_rent_legal_entity_name">Localizacion</th>
					</tr>
				</thead>
				<tr v-for="artPiece in laravelData.data">

					<td v-if="show_name" v-text="artPiece.name"></td>
					<td v-if="show_technique" v-text="artPiece.technique"></td>
					<td v-if="show_current_location" v-text="artPiece.currentLocation"></td>
				</tr>
			</table>
		</ul>
		<pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination>
		{{show_name}}
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
			axios.get('api/artPiece/'+self.obj_id+'/rents/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>

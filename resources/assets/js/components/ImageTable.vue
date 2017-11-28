<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_image">Imagen</th>
						<th v-if="show_description">Descripccion</th>
						<th v-if="show_links">Acciones</th>

					</tr>
				</thead>
				<tr v-for="image in laravelData.data">
					<td v-if="show_image" ><img :src="'/storage/'+image.fileLocation"></td>
					<td v-if="show_description" v-text="image.description"></td>
					<td v-if="show_links">
						<a :href="'/image/'+image.id">
							<i class="fa fa-object-ungroup" aria-hidden="true"></i>Ver
						</a>
						|
						<a :href="'/image/'+image.id+'/edit'">
							<i style="color:#f8990e" class="fa fa-pencil" aria-hidden="true"></i>Modificar
						</a>
						|
						<a :href="'/image/'+image.id+'/delete'">
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
		show_image:{default:true},
		show_description:{default:true},
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
			axios.get('/api/artPiece/'+self.obj_id+'/images/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>
img
{
	max-width:128px;
	height:auto;
}
td
{
    text-align:center; 
    vertical-align:middle;
}



</style>

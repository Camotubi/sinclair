
<template>
	<div class="container">
		<ul>
			<table class="table table-bordered table-sm">
				<thead class="thead-light">
					<tr>
						<th v-if="show_name">Nombre</th>
						<th v-if="show_technique">Email</th>
						<th v-if="show_current_location">Telefono</th>
						<th v-if="show_links">Acciones</th>

					</tr>
				</thead>
				<tr v-for="artPiece in laravelData.data">

					<td v-if="show_name" ><a :href="'/artPiece/' +artPiece.id">{{artPiece.name}}</a></td>
					<td v-if="show_email" v-text="legalEntity.email"></td>
					<td v-if="show_phone" v-text="legalEntity.phone"></td>
					<td v-if="show_links"><a :href="'/legalEntity/'+legalEntity.id+'/show'"><i class="fa fa-pencil" aria-hidden="true"></i>
Modificar</a>|<a :href="'/legalEntity/'+legalEntity.id+'/delete'"><i style="color:red" class="fa fa-trash" aria-hidden="true"></i>
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
		show_email:{default:true},
		show_phone:{default:true},
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
			axios.get('api/legalEntity/paginate/'+ self.page_amount +'?page=' + page).then(
				function(response){
					self.laravelData = response.data;
				});
		}
	}
}
</script>
<style>




</style>


@extends('layouts.app')
@section('content')
<div id ="app">
		<form action="/user" method="post">
		{{csrf_field()}}
			<div class="form-row">
				<div class= "form-group col-md-4">	
						<label for = "usernameInput">Nombre de Usuario:</label>
						<input v-model = "username" v-on:change ="checkUniqueUser" required class = "form-control" id="usernameInput" type = "text" name ="username">
				</div>
				<div class= "form-group col-md-4">	
						<label for = "emailInput">Email:</label>
						<input v-model ="email" v-on:change="checkUniqueEmail" required class = "form-control" id="emailInput" type="text" name ="email">
				</div>
				<div class= "form-group col-md-4">	
						<label for = "passwordInput">Contraseña:</label>
						<input v-model ="password" class = "form-control" id = "passwordInput" required type ="password" name ="password" >
				</div>
			</div>
			<div class="form-row">
				<div class= "form-group col-md-6">	
						<label for = "firstNameInput">Primer Nombre:</label>
						<input class = "form-control" id="firstNameInput" type = "text" name ="firstName">
				</div>
				<div class= "form-group col-md-6">	
						<label for = "lastNameInput">Apellido:</label>
						<input class = "form-control" id="lastNameInput" type = "text" name ="lastName">
				</div>
			</div>
			<label>Tipo de Usuario:</label>
				<div class ="form-check">
					<label class="form-check-label">
						<input class="form-check-input" name = "adminType" type="checkbox" value="true">
						Administrador
					</label>
				</div>
				<div class ="form-check">
					<label class="form-check-label">
						<input class="form-check-input" name ="editorType" type="checkbox" checked value ="true" disabled >
						Editor
					</label>
				</div>
			<input type="submit" class= "btn btn-primary" :disabled="!allowSubmit" value="Crear Usuario"> 
		</form>	
<pre>
	@{{$data}}
	@{{allowSubmit}}
	@{{incorrectEmail}}
	@{{username.length}}
</pre>
</div>

<script>
	new Vue({
		el:'#app',
		data: {
			username:'',
			email:'',
			password:'',
			userExists:true,
			emailExists:true,


		},
		methods:{
			checkUniqueUser: function() {
				var self = this;	
				if(this.username.length  ==0)
				{
					this.incorrectUsername = true ;
				}
				else
				{

					axios.get('/api/user/findUsername/'+ self.username).then(
						function(response){
							self.userExists = response.data;
						})
				}

			},

			checkUniqueEmail: function() {
				var self = this;	
				if(self.email.length == 0)
				{
					//this.incorrectEmail = true;
				}
				else
				{
					axios.get('/api/user/findEmail/'+ self.email).then(
						function(response){
							self.emailExists = response.data;
						})

				}

			}
		},
		computed:{
			allowSubmit: function(){
				return !(this.userExists || this.emailExists || this.incorrectEmail || this.incorrectPassword)
			},
				correctUser: function(){
					return (this.username.length > 0)
				},
			incorrectEmail: function validateEmail() {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    				return !re.test(this.email)
			},
			incorrectPassword: function validatePassword()
			{
				return (this.password.length <8)
			}


		},
});

</script>
@endsection

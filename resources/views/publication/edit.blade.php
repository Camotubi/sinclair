@extends('layouts.app')

@section('title')
	Actualización de Publicación
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Actualización de Publicación</h3>
				<form class="" action="/publication/{{$publication->id}}" method="post">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="title">Título:</label>
							<input class="form-control" type="text" name="name" value="{{$publication->name}}">
						</div>
						<div class="form-group col-md-6">
							<label for="body">Contenido:</label>
							<textarea class="form-control" name="body" rows="20"
								cols="120">{{$publication->body}}</textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="userId">Publicado por:</label>
							<input type="text" class="form-control" name="userId" value="{{$publication->userId}}" list="users">
								<datalist id="users">
									@foreach($users as $user)
										<option value ="{{$user->id}}"> {{$user->name}}</option>
									@endforeach
								</datalist>
						</div>
					</div>
					<input type="submit" name="update" class="btn btn-primary" value="Actualizar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

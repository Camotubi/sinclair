@extends('layouts.app')

@section('title')
	Registro de Publicación
@endsection

@section('content')
	<div>
		<section>
			<article>
				<h3>Registro de Publicación</h3>
				<form class="" action="/publication" method="post">
					{{ csrf_field() }}
					<datalist id="users">
						@foreach($users as $user)
							<option value ="{{$user->id.'-'.$user->name}}"</option>
						@endforeach
					</datalist>
					<datalist id="tags">
						@foreach($tags as $tag)
							<option value ="{{$tag->id.'-'.$tag->name}}"</option>
						@endforeach
					</datalist>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="title">Título:</label>
							<input class="form-control" type="text" name="name" value="">
						</div>
						<div class="form-group col-md-8">
							<label for="body">Contenido:</label>
							<textarea class="form-control" name="body" rows="20"
								cols="120"></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="userId">Publicado por:</label>
							@for($i = 0; $i < $numUsers; $i++)
							<div class="form-group">
								<input type="text" class="form-control" name="users[]" value="" list="users">
							</div>
							@endfor
							<a href="/publication/create?numUsers={{$numUsers}}&numTags={{$numTags}}&modUserFields=p">Agregar</a>
							<a href="/publication/create?numUsers={{$numUsers}}&numTags={{$numTags}}&modUserFields=m">Quitar</a>
					</div>
					<div class="form-group col-md-6">
						<label for="userId">Etiquetas:</label>
						@for($i = 0; $i < $numTags; $i++)
						<div class="form-group">
							<input type="text" class="form-control" name="tags[]" value="" list="tags">
						</div>
						@endfor
						<a href="/publication/create?numUsers={{$numUsers}}&numTags={{$numTags}}&modTagFields=p">Agregar</a>
						<a href="/publication/create?numUsers={{$numUsers}}&numTags={{$numTags}}&modTagFields=m">Quitar</a>
				</div>
				<br>
					<input type="submit" name="register" class="btn btn-primary" value="Publicar">
				</form>
			</article>
		</section>
	</div>

	</div>
@endsection

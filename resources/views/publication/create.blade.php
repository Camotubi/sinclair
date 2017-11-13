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
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="title">Título:</label>
            <input class="form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-md-6">
            <label for="body">Contenido:</label>
            <textarea class="form-control" name="body" rows="20"
            cols="120"></textarea>
          </div>
          <div class="form-group col-md-4">
            <label for="userId">Publicado por:</label>
            <select class="form-control" class="" name="userId">
              <option value="1">Ruben</option>
              <option value="2">Simon</option>
            </select>
          </div>
        </div>
        <input type="submit" name="register" class="btn btn-primary" value="Publicar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

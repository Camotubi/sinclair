@extends('layouts.app')

@section('title')
  Registro de Etiqueta
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Etiqueta</h3>
      <form class=""  action= "/tag" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="tag">Nombre:</label>
            <input class="form-control" type="tag" name="name" value="">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" name="register" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

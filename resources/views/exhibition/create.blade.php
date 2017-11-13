@extends('layouts.app')

@section('title')
  Registro de Exhibición
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Exhibición</h3>
      <form class=""  action= "/exhibition" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="location">Lugar:</label>
            <input class="form-control" type="text" name="location" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="date">Fecha:</label>
            <input class="form-control" type="date" name="date" value="">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" name="register" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

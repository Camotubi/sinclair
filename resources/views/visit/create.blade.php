@extends('layouts.app')

@section('title')
  Registro de Visita
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Visita</h3>
      <form class=""  action= "/visit" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="visitorId">Visitante:</label>
            <input class="form-control" type="text" name="visitorId" value="">
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

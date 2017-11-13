@extends('layouts.app')

@section('title')
  Registro de Mueble
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Mueble</h3>
      <form class="" action="/furniture" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="furnitureTypeId">Tipo de mueble:</label>
            <input class="form-control" type="text" name="furnitureTypeId" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="donatorId">Donador:</label>
            <input class="form-control" type="text" name="donatorId" value="">
          </div>
        </div>
        <input type="submit" name="register" class="btn btn-primary" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

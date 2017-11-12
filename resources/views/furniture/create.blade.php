@extends('layouts.app')

@section('title')
  Registro de obra de arte
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
            <select class="form-control" class="" name="furnitureTypeId">
              <option value="1">Sillon</option>
              <option value="2">Mesa</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="donatorId">Donador:</label>
            <select class="form-control" name="donatorId">
              <option value="1">Ruben</option>
              <option value="2">Ramon</option>
            </select>
          </div>
        </div>
        <input type="submit" name="register" class="btn btn-primary" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

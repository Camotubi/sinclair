@extends('layouts.app')

@section('title')
  Registro de Entidad Legal
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de entidad legal</h3>
      <form class=""  action= "/legalEntity" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="address">Dirección:</label>
            <input class="form-control" type="text" name="address" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="phone">Número Telefónico:</label>
            <input class="form-control" type="text" name="phone" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="ruc">RUC:</label>
            <input class="form-control" type="text" name="ruc" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="identificationNumber">Numero de Identificación:</label>
            <input class="form-control" type="number" name="identificationNumber" value="">
          </div>
          <div class="form-check">
            <label class="form-check-label">
  						<input class="form-check-input" name="philanthropy" type="checkbox" value="true">
              Filantropía
  					</label>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" name="register" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

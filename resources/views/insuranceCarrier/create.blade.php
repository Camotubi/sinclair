@extends('layouts.app')

@section('title')
  Registro de Aseguradora
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Aseguradora</h3>
      <form class=""  action= "/insuranceCarrier" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" value="">
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
        </div>
        <input type="submit" class="btn btn-primary" name="register" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

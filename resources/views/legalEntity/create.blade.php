@extends('layouts.app')

@section('title')
  Registro de obra de arte
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de entidad legal</h3>
      <form class=""  action= "/legalEntity" method="post">
        {{ csrf_field() }}
        <label for="name">Nombre:</label>
        <input type="text" name="name" value=""><br>
        <label for="address">Dirección:</label>
        <input type="text" name="address" value=""><br>
        <label for="phone">Número Telefónico:</label>
        <input type="text" name="phone" value=""><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value=""><br>
        <label for="ruc">RUC:</label>
        <input type="text" name="ruc" value=""><br>
        <label for="identificationNumber">Numero de Identificación:</label>
        <input type="number" name="identificationNumber" value=""><br>
        <label for="philanthropy">Filantropía:</label>
        <input type="checkbox" name="philanthropy" value="true">
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

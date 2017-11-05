@extends('layouts.app')

@section('title')
  Registro de obra de arte
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Persona Juridica</h3>
      <form class="" action="index.html" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="" value=""><br>
        <label for="address">Direccion:</label>
        <input type="text" name="" value=""><br>
        <label for="phone_number">Numero Telefonico:</label>
        <input type="text" name="" value=""><br>
        <label for="email">Email:</label>
        <input type="email" name="" value=""><br>
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

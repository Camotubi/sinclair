@extends('layouts.frontend.main')

@section('title')
  Registro de obra de arte
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Persona</h3>
      <form class="" action="index.html" method="post">
        <label for="id">Número de identificación:</label>
        <input type="number" name="" value=""><br>
        <label for="name">Nombre:</label>
        <input type="text" name="" value=""><br>
        <label for="era">Apellido:</label>
        <input type="text" name="" value=""><br>
        <label for="style">Fecha de Nacimiento:</label>
        <input type="date" name="" value=""><br>
        <label for="technique">Direccion:</label>
        <input type="text" name="" value=""><br>
        <label for="currentLocation">Numero Telefonico:</label>
        <input type="text" name="" value=""><br>
        <label for="criticalAnalisis">Email:</label>
        <input type="email" name="" value=""><br>
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

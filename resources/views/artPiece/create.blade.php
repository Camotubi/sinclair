@extends('layouts.frontend.main')

@section('title')
  Registro de obra de arte
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de obra de arte</h3>
      <form class="" action="index.html" method="post">
        <label for="id">Número de identificación:</label>
        <input type="number" name="" value=""><br>
        <label for="name">Nombre:</label>
        <input type="text" name="" value=""><br>
        <label for="era">Era:</label>
        <input type="text" name="" value=""><br>
        <label for="style">Estilo:</label>
        <input type="text" name="" value=""><br>
        <label for="technique">Técnica:</label>
        <input type="text" name="" value=""><br>
        <label for="currentLocation">Localización actual:</label>
        <input type="text" name="" value=""><br>
        <label for="criticalAnalisis">Analisis Crítico:</label>
        <input type="text" name="" value=""><br>
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

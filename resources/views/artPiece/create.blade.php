@extends('layouts.app')

@section('title')
  Registro de obra de arte
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de obra de arte</h3>
      <form class=""  action= "artPiece" method="post">
        {{ csrf_field() }}
        <label for="name">Nombre:</label>
        <input type="text" name="name" value=""><br>
        <label for="era">Era:</label>
        <input type="text" name="era" value=""><br>
        <label for="style">Estilo:</label>
        <input type="text" name="style" value=""><br>
        <label for="technique">Técnica:</label>
        <input type="text" name="technique" value=""><br>
        <label for="currentLocation">Localización actual:</label>
        <input type="text" name="currentLocation" value=""><br>
        <label for="criticalAnalisis">Analisis Crítico:</label>
        <input type="text" name="criticalAnalisis" value=""><br>
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

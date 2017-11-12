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
        <label for="name">Nombre:</label>
        <input type="text" name="name" value=""><br>
        <label for="furnitureTypeId">Tipo de mueble:</label>
        <select class="" name="furnitureTypeId">
          <option value="1">Sillon</option>
          <option value="2">Mesa</option>
        </select>
        <br>
        <label for="donatorId">Donador:</label>
        <select class="" name="donatorId">
          <option value="1">Ruben</option>
          <option value="2">Ramon</option>
        </select>
        <button type="submit" name="register">Registrar</button>
      </form>
    </article>
  </section>
</div>

</div>
@endsection

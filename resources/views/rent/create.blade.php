@extends('layouts.app')

@section('title')
  Registro de Alquiler de Obra
@endsection

@section('content')
<div>
  <section>
    <article>
      <h3>Registro de Alquiler de Obra</h3>
      <form class="" action="/rent" method="post">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="artPieceId">Obra:</label>
            <select class="form-control" class="" name="artPieceId">
              <option value="1">La tulivieja</option>
              <option value="2">La bella durmiente</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="legalEntityId">Entidad Legal:</label>
            <select class="form-control" name="legalEntityId">
              <option value="1">Rodrigo Inc.</option>
              <option value="2">E Corp.</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="moneyQuantity">Cantidad de dinero:</label>
            <input class="form-control" type="number" step="any" name="moneyQuantity" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="effectiveDate">Fecha de efectividad:</label>
            <input class="form-control" type="date" name="effectiveDate" value="">
          </div>
          <div class="form-group col-md-4">
            <label for="terminationDate">Fecha de terminación:</label>
            <input class="form-control" type="date" name="terminationDate" value="">
          </div>
        </div>
        <input type="submit" name="register" class="btn btn-primary" value="Registrar">
      </form>
    </article>
  </section>
</div>

</div>
@endsection

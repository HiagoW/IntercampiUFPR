@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Campus
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('campi.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nome:</label>
              <input type="text" class="form-control" name="nomeCampus"/>
          </div>
          <div class="form-group">
            @csrf
            <label for="sigla">Sigla:</label>
            <input type="text" class="form-control" name="sigla"/>
        </div>
        <div class="form-group">
            @csrf
            <label for="urlMaps">URL do Maps:</label>
            <input type="text" class="form-control" name="urlMaps"/>
        </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
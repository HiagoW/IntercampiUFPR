@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Linha
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
      <form method="post" action="{{ route('linhas.update', $linha->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" name="nomeLinha" value='{{ $linha->nomeLinha }}' />
        </div>
        <div class="form-group">
            @csrf
            <label for="urlMaps">URL do Maps:</label>
            <input type="text" class="form-control" name="urlMaps"/>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
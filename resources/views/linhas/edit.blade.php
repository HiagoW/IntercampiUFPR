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
              <label for="situacao">Situação:</label>
              <select name='situacao'>
                  <option value='a' @if($linha->situacao == 'a') selected @endif>Ativo</option>
                  <option value='i' @if($linha->situacao == 'i') selected @endif>Inativo</option>
                  <option value='m' @if($linha->situacao == 'm') selected @endif>Manutenção</option>
              </select>
            </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Horario
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
      <form method="post" action="{{ route('horarios.update', $horario->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="horario">Horario:</label>
          <input type="text" class="form-control" name="horario" value='{{ $horario->horario }}' />
        </div>
        <div class="form-group">
            @csrf
            <label for="chegada">Chegada:</label>
            <input type="checkbox" @if($horario->chegada!=null) checked @endif value="c" class="form-control" name="chegada">
          </div>
          <div class="form-group">
              @csrf
              <label for="campus">Campus:</label>
              <select name='campus'>
                @foreach($campi as $campus)
                  <option value={{$campus->id}} @if($horario->campus == $campus->id) selected @endif>{{$campus->nomeCampus}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                @csrf
                <label for="linha">Linha:</label>
                <select name='linha'>
                  @foreach($linhas as $linha)
                    <option value={{$linha->id}} @if($horario->linha == $linha->id) selected @endif>{{$linha->nomeLinha}}</option>
                  @endforeach
                </select>
              </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
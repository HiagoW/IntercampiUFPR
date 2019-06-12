@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Horario
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
      <form method="post" action="{{ route('horarios.store') }}">
          <div class="form-group">
              @csrf
              <label for="horario">Horario:</label>
              <input type="text" class="form-control" name="horario"/>
          </div>
          <div class="form-group">
            @csrf
            <label for="chegada">Chegada:</label>
            <input type="checkbox" value="c" class="form-control" name="chegada">
          </div>
          <div class="form-group">
            @csrf
            <label for="campus">Campus:</label>
            <select name='campus'>
              @foreach($campi as $campus)
                <option value={{$campus->id}}>{{$campus->nomeCampus}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
              @csrf
              <label for="linha">Linha:</label>
              <select name='linha'>
                @foreach($linhas as $linha)
                  <option value={{$linha->id}}>{{$linha->nomeLinha}}</option>
                @endforeach
              </select>
            </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
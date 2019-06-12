@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <a href="{{ route('linhas.index')}}" class="btn btn-primary">Linhas</a>
  <a href="{{ route('campi.index')}}" class="btn btn-primary">Campus</a><br />
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Horario</td>
          <td>Chegada</td>
          <td>Linha</td>
          <td>Campus</td>
          <td colspan="2">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{$horario->horario}}</td>
            <td>{{$horario->chegada}}</td>
            <td>{{$horario->linha}}</td>
            <td>{{$horario->campus}}</td>
            <td><a href="{{ route('horarios.edit',$horario->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('horarios.destroy', $horario->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
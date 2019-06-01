@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <a href="{{ route('horarios.index')}}" class="btn btn-primary">Horarios</a>
  <a href="{{ route('campi.index')}}" class="btn btn-primary">Campus</a><br />
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Linha</td>
          <td>URL do Maps</td>
          <td colspan="2">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($linhas as $linha)
        <tr>
            <td>{{$linha->id}}</td>
            <td>{{$linha->nomeLinha}}</td>
            <td><a href='{{$linha->urlMaps}}'></a></td>
            <td><a href="{{ route('linhas.edit',$linha->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('linhas.destroy', $linha->id)}}" method="post">
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
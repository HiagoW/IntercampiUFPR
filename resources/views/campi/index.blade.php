@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .content {
    margin-top: 20px;
  }
</style>
<div class="uper">
  <a style="display:none" href="{{ route('horarios.index')}}" class="btn btn-primary">Horarios</a>
  <a href="{{ route('linhas.index')}}" class="btn btn-primary">Linhas</a><br />
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  </div>
  <div class="content">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Campus</td>
          <td>Sigla</td>
          <td>URL do Maps</td>
          <td colspan="2">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($campi as $campus)
        <tr>
            <td>{{$campus->id}}</td>
            <td>{{$campus->nomeCampus}}</td>
            <td>{{$campus->sigla}}</td>
            <td><a href='{{$campus->urlMaps}}'>{{$campus->nomeCampus}}</a></td>
            <td><a href="{{ route('campi.edit',$campus->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('campi.destroy', $campus->id)}}" method="post">
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
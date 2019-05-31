@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Campus</td>
          <td>Sigla</td>
          <td colspan="2">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($campi as $campus)
        <tr>
            <td>{{$campus->id}}</td>
            <td>{{$campus->nomeCampus}}</td>
            <td>{{$campus->sigla}}</td>
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
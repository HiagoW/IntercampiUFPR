@extends('layout')

@section('content')
	<div class="col-sm-8">
		<h1>Register</h1>
	

	<form method="POST" action="/register">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" name="username" required>
		</div>

		<div class="form-group">
			<label for="password">Passowrd:</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>
		
		<div class="form-group">
			<label for="password_confirmation">Passowrd confirmation:</label>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Register</button>
		</div>

		@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

	</form>
	
	</div>
@endsection
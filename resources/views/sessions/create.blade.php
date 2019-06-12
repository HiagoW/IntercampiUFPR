@extends('layout')

@section ('content')
	<div class="col-md-8">
		<h1>Sign in</h1>

		<form method="POST" action="/login">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username">
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Sign in</button>
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
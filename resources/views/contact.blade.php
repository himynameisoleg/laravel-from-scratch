@extends ('layouts.app')

@section ('content')
<div class="container">
	<div class="form-group row">
		<form method="POST" action="/contact">
			@csrf
			<label>Email From:</label>
			<input type="text" name="email">
			<button type="submit" class="btn btn-primary">Email me</button>

			@if (session('message'))
				<div>{{ session('message') }}</div>
			@endif	
			@error('email')
				<div style="color: red;">{{ $message }}</div>
			@enderror
		</form>
	</div>
</div>
@endsection
{{-- @extends ('layout') --}}

{{-- @section ('content') --}}
<div>
	<form method="POST" action="/contact">
		@csrf
		<label>Email:</label>
		<input type="text" name="email">
		@error('email')
			<div class="">{{ $message }}</div>
		@enderror
		<button type="submit">Email me</button>
		@if (session('message'))
			<div>{{ session('message') }}</div>
		@endif
	</form>
</div>
{{-- @endsection --}}
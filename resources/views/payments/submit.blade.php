@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form method="POST" action="{{ route('payments') }}">
				@csrf
				<button type="submit" class="btn btn-primary">
					Submit Payment
				</button>
			</form>
		</div>
	</div>
</div>
@endsection('content')
@extends('layouts.app')

@section('content')
<div class="continer">
	<ul>
		@forelse ($notifications as $notification)
			@if ($notification->type === 'App\Notifications\PaymentReceived')
				<li>We have received a payment of ${{ $notification->data['amount'] / 100 }} from you.</li>
			@endif
		@empty
			<li>You have no unread notifications</li>
		@endforelse
	</ul>
</div>

@endsection
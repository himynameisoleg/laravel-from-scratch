@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		@forelse ($articles as $article)
			<div id="content">
				<div class="title">
					<h2>
						{{-- verbos NAMED ROUTE way --}}
						{{-- <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a> --}}
						{{-- Or with CUSTOM path() method --}}
						<a href="{{ $article->path() }}">{{ $article->title }}</a>
					</h2>
					<span class="byline">{{ $article->excerpt }}</span>
				</div>
				<p>{{ $article->body }}</p>
			</div>
		@empty
			<p>No relevant articles yet.</p>
		@endforelse
	</div>
</div>

@endsection
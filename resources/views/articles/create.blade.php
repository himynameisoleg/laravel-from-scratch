@extends('layout')

@section ('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
	<div id="page" class="container">

		<h1 class="title">Title</h1>
		<h2 class="subtitle">Subtitle</h2>

		<form method="POST" action="/articles">
			@csrf

			<div class="field">
				<label class="label" for="title">Title</label>
				<p class="control">
					<input class="input @error('title') is-danger @enderror " name="title" type="text" placeholder="Text input"
						value="{{ old('title') }}">

					@error('title')
					<p class="help is-danger">{{ $errors->first('title') }}</p>
					@enderror
				</p>
			</div>

			<div class="field">
				<label class="label" for="excerpt">Excerpt</label>
				<p class="control">
					<textarea class="input @error('excerpt') is-danger @enderror" name="excerpt" type="text"
						placeholder="Text input">{{ old('excerpt') }}</textarea>

					@error('excerpt')
					<p class="help is-danger">{{ $errors->first('excerpt') }}</p>
					@enderror
				</p>
			</div>

			<div class="field">
				<label class="label" for="body">Body</label>
				<p class="control">
					<textarea class="textarea @error('body') is-danger @enderror" name="body" placeholder="Textarea"
						>{{ old('body') }}</textarea>
					@error('body')
					<p class="help is-danger">{{ $errors->first('body') }}</p>
					@enderror
				</p>
			</div>

			<div class="field">
				<label class="label" for="body">Tags</label>
				<select multiple name="tags[]">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach	
				</select>

				<div class="control">
					@error('tags')
						<p class="help is-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="field is-grouped">
				<p class="control">
					<button class="button is-primary">Submit</button>
				</p>
			</div>
		</form>
	</div>
</div>

@endsection
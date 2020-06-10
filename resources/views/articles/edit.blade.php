@extends('layout')

@section ('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">

        <h1 class="title">Update Aricle</h1>
        <h2 class="subtitle">Subtitle</h2>

        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf
            @method ('PUT')

            <div class="field">
                <label class="label" for="title">Title</label>
                <p class="control">
                    <input class="input" name="title" type="text" value="{{ $article->title }}">
                </p>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <p class="control">
                    <textarea class="input" name="excerpt" type="text" placeholder="Text input">{{ $article->excerpt }}</textarea>
                </p>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <p class="control">
                    <textarea class="textarea" name="body" placeholder="Textarea">{{ $article->body }}</textarea>
                </p>
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
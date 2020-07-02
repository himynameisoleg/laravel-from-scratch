<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $validatedAttributes = $this->validateArticle();

        Article::create($validatedAttributes);

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]); // or can use compact('article') instead of ['article' => $article]
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect( route('articles.show', $article) );
    }

    public function destroy()
    {
    }


    protected function validateArticle() 
    {
        // validate returns an array of the attributes
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}

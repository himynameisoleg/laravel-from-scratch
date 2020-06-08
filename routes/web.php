<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    // $article = App\Article::take(2)->get();
    // $article = App\Article::paginate(2);
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('articles', 'ArticlesController@index');
Route::get('articles/{article}', 'ArticlesController@show');
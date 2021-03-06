<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->name('payments')->middleware('auth');

Route::get('notifications/show', 'UserNotificationsController@show')->middleware('auth');


Route::get('conversations', 'ConversationsController@index');
Route::get('conversations/{conversation}', 'ConversationsController@show')->middleware('can:view,conversation');
Route::post('/best-replies/{reply}', 'ConversationBestReplyController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/about', function () {
    // $article = App\Article::take(2)->get();
    // $article = App\Article::paginate(2);
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('articles', 'ArticlesController@index')->name('articles.index');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('articles/{article}/edit', 'ArticlesController@edit');
Route::put('articles/{article}', 'ArticlesController@update');
Route::get('/contact', 'ContactController@show');
Route::post('contact', 'ContactController@store');


Auth::routes();


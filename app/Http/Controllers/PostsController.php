<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function show($slug)
	{
        // use Post model to grab data
        $post = Post::where('slug', $slug)->first();

        // or manually connect to db and query
        // $post = DB::table('posts')->where('slug', $slug)->first();

         if (! $post) {
             abort('404');
         }

        // dd($posts);

		return view('post', [
			'post' => $post
		]);
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::latest()->get();

        // integrate vue
        return response()->json(['posts' => $posts]);
    }

    public function allPosts()
    {

        $posts = Post::latest()->get();

        return view('posts.index')->with(compact('posts'));

    }

    public function store(Request $request)
    {

        // Form validation
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        // save the data
        Post::create($request->all());

        // return redirect
        return redirect()->route('all_posts')->with('success', 'Your post is saved');

    }

    public function update(Request $request, Post $post)
    {

        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
    }

    public function destroy(Post $post)
    {

        $post->delete();

    }
}

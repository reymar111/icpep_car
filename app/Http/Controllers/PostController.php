<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::all();

        return view('posts.index')->with(compact('posts'));

    }

    public function create()
    {



    }

    public function store(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
         ]);

         $post = new Post();
         $post->title = $request->title;
         $post->description = $request->description;
         $post->save();

         dd($post);

        //  return back()->with('success', 'Your post is saved');


    }

    public function show(Post $post)
    {



    }

    public function update(Request $request, Post $post)
    {



    }

    public function destroy(Post $post)
    {



    }
}

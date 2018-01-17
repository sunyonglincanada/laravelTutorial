<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Get Posts List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Get specific post details
     * @param  Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
//        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Create a new post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store post meta to database
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {

//        $post = new Post;
//
//
//        $post->title = request('title');
//
//        $post->body = request('body');
//
//        $post->save();

        $this->validate(request(), [

            'title' => 'required',

            'body'  => 'required'
        ]);

        Post::create(request(['title', 'body']));



        return redirect('/');
    }
}

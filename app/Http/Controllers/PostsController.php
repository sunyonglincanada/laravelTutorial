<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Get Posts List
     * @param PostsRepository $posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PostsRepository $posts)
    {

        $posts = $posts->all();

//        $posts = Post::latest()
//            ->filter(request(['month', 'year']))
//            ->get();



        $archives = Post::archives();



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


        session()->flash('message', 'Your post has been published.');


        return redirect('/');
    }
}

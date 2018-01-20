<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Get Posts List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();


//        $posts = Post::latest();
//
//
//        if($month = request('month')) {
//
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//
//        }
//
//
//        if($year = request('year')) {
//
//            $posts->whereYear('created_at', $year);
//
//        }
//
//
//        $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

//        return $archives;

        return view('posts.index', compact(['posts','archives']));
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

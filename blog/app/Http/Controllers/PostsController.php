<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{
    public function index() {

        //dd(request('month'));
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function create() {
    	return view('posts.create');
    }

    public function store() {
    	//dd(request('title'));
    	// $post = new Post;
    	// $post->title = request('title');
    	// $post->body = request('body');	

    	// $post->save();
        $this->validate(request(), ['title'=>'required', 'body'=>'required']);
    	//old method=>Post::create(request()->all());
        auth()->user()->publish(new Post(request(['title', 'body'])));
    	return redirect()->home();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post) {
    	$this->validate(request(), ['body' => 'required|min:2']);
    	$comment = new Comment([
    		'body' => request('body'),
    		'user_id' => auth()->user()->id
    	]);
    	$post->addComment($comment);
    	return back();
    }
}

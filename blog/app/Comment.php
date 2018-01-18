<?php

namespace App;

class Comment extends Model
{
    public function post() {
    	return $this->belongsTo(Post::class);
    }

 	public function user() {
    	return $this->belongsTo(User::class);
    }

    public function init($body) {
    	$this->body = $body;
    	$this->user_id = auth()->user()->id;
    }	      
}

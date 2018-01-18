@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<h1>{{$post->title}}</h1>
		<p>
			{{$post->body}}
		</p>

		<hr>

		@if(count($post->comments))
		<div class="comments">
			<ul class="list-group">
				@foreach($post->comments as $comment)
					<li class="list-group-item">
						<strong>
							{{$comment->created_at->diffForHumans()}}
							by {{$comment->user->name}}:
						</strong>
						<p>&nbsp;{{$comment->body}}</p>
					</li>
				@endforeach
			</ul>
		</div>

		<hr>
		@endif
		
		@auth
		<div class="card">
			<div class="card-block" style="padding: 20px">
				<form method="POST" action="/posts/{{ $post->id }}/comments/">
					{{csrf_field()}}
					<div class="form-group">
						<textarea class="form-control" name="body" placeholder="Your comment here." required></textarea>
					</div>
				
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
				@include('layouts.errors')
			</div>
		</div>
		@endauth
	</div>
@endsection
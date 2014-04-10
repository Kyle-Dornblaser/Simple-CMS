@extends('master')

@section('title')
{{ $post -> title }}
@stop

@section('content')
<h1>{{ $post -> title }}</h1>
<p class="lead">
	by <a href="">{{ $post -> user_id }}</a>
	@if(Auth::check())
		@if(Auth::user() -> role == 'Admin')
		<a href="{{ route('editPost', array('id' => $post -> id)) }}" class="pull-right">Edit</a>
		@endif
	@endif
</p>
<hr>
<p>
	<span class="glyphicon glyphicon-time"></span> Posted on {{ date('F j, Y \a\t g:i A', strtotime($post -> created_at)) }}
</p>
<hr>

{{ $post -> content }}

<hr>
<p>Tags:
@foreach($post -> tags as $tag)
	{{$tag -> name}}
@endforeach
</p>

<hr>

<!-- the comment box -->
<div class="well">
	<h4>Leave a Comment:</h4>
	<form role="form">
		<div class="form-group">
			<textarea class="form-control" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">
			Submit
		</button>
	</form>
</div>

<hr>

<!-- the comments -->
<h3>Start Bootstrap <small>9:41 PM on August 24, 2013</small></h3>
<p>
	This has to be the worst blog post I have ever read. It simply makes no sense. You start off by talking about space or something, then you randomly start babbling about cupcakes, and you end off with random fish names.
</p>

<h3>Start Bootstrap <small>9:47 PM on August 24, 2013</small></h3>
<p>
	Don't listen to this guy, any blog with the categories 'dinosaurs, spaceships, fried foods, wild animals, alien abductions, business casual, robots, and fireworks' has true potential.
</p>
@stop

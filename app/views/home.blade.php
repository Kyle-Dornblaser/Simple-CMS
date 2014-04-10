@extends('master')

@section('title')
Post Administration
@stop

@section('content')
@foreach($posts as $post)

<h1><a href="{{ route('showPost', array('id' => $post -> id)) }}">{{ $post -> title }}</a></h1>
<p class="lead">
	by <a href="">{{ $post -> user_id }}</a>
</p>
<hr>
<p>
	<span class="glyphicon glyphicon-time"></span> Posted on {{ date('F j, Y \a\t g:i A', strtotime($post -> created_at)) }}
</p>
<hr>

@endforeach

@stop
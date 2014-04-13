@extends('master')

@section('title')
Web Coding Tutorials
@stop

@section('content')

<?php
	if (Auth::check()) { 
		if (Auth::user()->role != 'Premium') {
			$premiumUser = false;
		} else {
			$premiumUser = true;
		}
	} else {
		$premiumUser = false;
	}

?>

@foreach($posts as $post)

<?php $premium = false; ?>
@foreach($post -> tags as $tag)
@if ($tag -> id == 'premium')
<?php $premium = true; ?>
@endif
@endforeach

<h1><a href="{{ route('showPost', array('id' => $post -> id)) }}">{{ $post -> title }}</a></h1>
<p class="lead">
	by <a href="">{{ $post -> user -> first_name . ' ' . $post -> user -> last_name }}</a>
</p>
<hr>
<p>
	<span class="glyphicon glyphicon-time"></span> Posted on {{ date('F j, Y \a\t g:i A', strtotime($post -> created_at)) }}
</p>
<hr>
<?php
$summary = strip_tags($post -> content, '<p></p>');
$index = strpos($summary, '</p>') + 4;
//get this php out of the view!
?>
{{ substr($summary, 0, $index) }}
<p>
	<a href="{{ route('showPost', array('id' => $post -> id)) }}"> @if($premium && !$premiumUser)
	Purchase Premium to Read More
	@else
	Read More
	@endif </a>
</p>

<hr>

@endforeach

@stop

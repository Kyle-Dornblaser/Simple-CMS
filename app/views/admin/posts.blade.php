@extends('master-sans')

@section('title')
Post Administration
@stop

@section('content')

<h1>Post Administration</h1>
<table class="table">
	<tr>
		<th> ID </th>
		<th> Title </th>
		<th> Author </th>
		<th> Actions </th>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td> {{ $post -> id }} </td>
		<td><a href="{{ route('showPost', array('id' => $post -> id)) }}">{{ $post -> title }}</a></td>
		<td><a href="{{ route('showUser', array('id' => $post -> user_id )) }}">{{ $post -> user_id }}</a> </td>
		<td>
			<a href="{{ route('editPost', array('id' => $post -> id)) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="{{ route('deletePost', array('id' => $post -> id) )}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	@endforeach
</table>

@stop
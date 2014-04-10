@extends('master-sans')

@section('title')
Post Administration
@stop

@section('content')
<h1>Post Administration</h1>
<hr>

<table class="table">
	<tr>
		<th> ID </th>
		<th> Title </th>
		<th> Category </th>
		<th> Author </th>
		<th> Actions </th>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td> {{ $post -> id }} </td>
		<td> <a href="/show/{{ $post -> id }}">{{ $post -> title }}</a> </td>
		<td> {{ $post -> category_id }} </td>
		<td> {{ $post -> user_id }} </td>
		<td>
			<a href="{{URL::to('showPost', array('id' => $post -> id)) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	@endforeach
</table>

<hr>
@stop

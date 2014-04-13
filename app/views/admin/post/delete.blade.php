@extends('master')

@section('title')
Delete Post {{ $post -> id }}
@stop

@section('content')

{{ Form::open( array('url' => route('deletePost', array('id' => $post -> id)))) }}
<legend>
	Are you sure you want to delete post {{ $post -> id }}? This process is irreversible.
</legend>
<div class="form-group">
	<a class="btn btn-default" href="{{ route('modPosts') }}">
		Cancel
	</a>
	<button type="submit" class="btn btn-danger">
		Delete
	</button>
</div>
{{ Form::close() }}
@stop

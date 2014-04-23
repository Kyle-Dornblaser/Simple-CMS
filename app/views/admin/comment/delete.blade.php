@extends('master')

@section('title')
Delete Comment {{ $comment -> id }}
@stop

@section('content')

{{ Form::open( array('url' => route('deleteComment', array('id' => $comment -> id)))) }}
<legend>
	Are you sure you want to delete comment {{ $comment -> id }}? This process is irreversible.
</legend>
<div class="form-group">
	<a class="btn btn-default" href="{{ route('home') }}">
		Cancel
	</a>
	<button type="submit" class="btn btn-danger">
		Delete
	</button>
</div>
{{ Form::close() }}
@stop

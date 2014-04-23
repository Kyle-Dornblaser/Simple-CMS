@extends('master')

@section('title')
Edit Post
@stop

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{ Form::open( array('url' => route('editPost', array('id' => $post -> id)))) }}
<div class="form-group">
	{{ Form::text('title', $post -> title, array('class' => 'form-control input-lg', 'placeholder' => 'Post Title')) }}
</div>
<div class="form-group">
	<textarea class="ckeditor" cols="80" id="editor1" name="content" rows="20">
		{{ $post -> content }}
	</textarea>
</div>
<div class="form-group">
	{{ Form::label('tags', 'Tags', array('control-label')) }}
	{{ Form::text('tags', PostController::tagsString($post), array('class' => 'form-control input-lg', 'placeholder' => 'Space separated tags. Ex: HTML CSS PHP')) }}
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		Save
	</button>
</div>
{{ Form::close() }}
@stop

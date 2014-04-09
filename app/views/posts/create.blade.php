@extends('master')

@section('title')
Create Post
@stop

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{ Form::open( array('action' => 'PostController@create')) }}
<div class="form-group">
	{{ Form::text('title', '', array('class' => 'form-control input-lg', 'placeholder' => 'Post Title')) }}
</div>
<div class="form-group">
	<textarea class="ckeditor" cols="80" id="editor1" name="content" rows="20">

	</textarea>
</div>
<div class="form-group">
	{{ Form::label('tags', 'Tags', array('control-label')) }}
	{{ Form::text('tags', '', array('class' => 'form-control input-lg', 'placeholder' => 'Comma separated tags. Ex: HTML, CSS, PHP')) }}
</div>
<div class="form-group">
	{{ Form::label('category', 'Category', array('control-label')) }}
	{{ Form::select('category', array('L' => 'Large', 'S' => 'Small'), null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">
		Save
	</button>
</div>
{{ Form::close() }}
@stop

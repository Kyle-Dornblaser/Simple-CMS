@extends('master')

@section('title')
{{ $post -> title }}
@stop

@section('content')

<h1>{{ $post -> title }}</h1>
<p class="lead">
	by <a href="{{ route('showUser', array('id' => $post -> user_id)) }}">{{ $post -> user -> first_name . ' ' . $post -> user -> last_name }}</a>
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
<p>
	Tags:
	@foreach($post -> tags as $tag)
	<a href="{{ route('showTag', array('id' => $tag -> id)) }}">{{$tag -> id}}</a>
	@endforeach
</p>

<hr>

<!-- the comment box -->
<div class="well" id="formWell">
	@if (Auth::guest())
	<h4>You must <a href="{{route('login')}}">login</a> to leave a comment.</h4>
	@elseif (Auth::check())
	<h4>Leave a Comment:</h4>
	{{ Form::open(array('action' => 'CommentController@save', 'id' => 'commentForm', 'data-replace' => '#submit-status', 'class' => 'ajax form')) }}
	<div class="form-group">
		<textarea class="form-control" id="comment_box" name="content" rows="3"></textarea>
		<input type="hidden" name="post_id" value="{{$post -> id}}">
	</div>
	<button type="submit" class="btn btn-primary">
		Submit
	</button>
	{{ Form::close() }}
	@endif
</div>

<hr>
<span id="comments"> @foreach (CommentController::getComments($post -> id) as $comment) <!-- the comments --> <h3>	
	@if (Auth::guest())
	@elseif (Auth::user())
	@if(Auth::user() -> role == 'Admin') <a href="{{ route('deleteComment', array('id' => $comment -> id)) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a> 
	@endif
	@endif
	{{ UserController::fullName($comment -> user_id) }}<small> {{ date('F j, Y \a\t g:i A', strtotime($comment -> created_at)) }}</small></h3> 
	<p>
		{{ $comment -> content }}
	</p> @endforeach </span>
@stop

@section('scripts')
<script type="text/javascript">
	$('#commentForm').on('submit', function() {

		$.ajax({
			type : 'post',
			url : '/comment',
			data : $("#commentForm").serialize(),
			success : function(result) {
	@if (Auth::guest())
		$('#comments').prepend('<h3>' + result['userId'] + ' <small>' + result['createdAt'] + '</small></h3>' + result['comment']);
	@elseif (Auth::user())
		@if(Auth::user() -> role == 'Admin')
			$('#comments').prepend('<h3><a href="/admin/comment/delete/' + result['id'] + '" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a> ' + result['userId'] + ' <small>' + result['createdAt'] + '</small></h3>' + result['comment']);
		@else
			$('#comments').prepend('<h3>' + result['userId'] + ' <small>' + result['createdAt'] + '</small></h3>' + result['comment']);
		@endif
	@endif
				
			}
		});
		$('#comment_box').val('');
		return false;
	});

</script>
@stop

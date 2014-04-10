@extends('layout')

@section('container')

<div class="row">
	<div class="col-sm-12">

		<!-- the actual blog post: title/author/date/content -->
		@yield('content')

	</div>
</div>

@stop
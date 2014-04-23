@extends('layout')

@section('container')
<div class="row">
  <div class="col-sm-8">

    <!-- the actual blog post: title/author/date/content -->
    @yield('content')

  </div>
  <div class="col-sm-4">
    <div class="well">
      <h4>Popular Post Tags</h4>
      <div class="row">
        <div class="col-lg-12">
        	<?php
        		$tags = TagController::popularTags();
				$count = count($tags);
        	?>
        	@foreach ($tags as $tag)
        		<?php $count--; ?>
        		@unless ($count <= 0)
        			<a href="{{ route('showTag', array('id' => $tag -> id)) }}">{{$tag -> id}}</a>,
        		@else
        			<a href="{{ route('showTag', array('id' => $tag -> id)) }}">{{$tag -> id}}</a>
        		@endunless
        	@endforeach
        </div>
      </div>
    </div>
    <!-- /well -->
    <div class="well">
      <h4>Theme Switcher</h4>
      <form id="switchform">
        <select name="switchcontrol" size="1" onChange="chooseStyle(this.options[this.selectedIndex].value, 60)">
          <option value="none" selected="selected">Light Theme</option>
          <option value="cyborg">Dark Theme</option>
        </select>
      </form>
    </div>
    <!-- /well -->
  </div>
</div>

@stop
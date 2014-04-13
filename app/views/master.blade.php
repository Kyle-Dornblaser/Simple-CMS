@extends('layout')

@section('container')
<div class="row">
	<div class="col-sm-8">

		<!-- the actual blog post: title/author/date/content -->
		@yield('content')

	</div>
	<div class="col-sm-4">
		<div class="well">
			<h4>Blog Search</h4>
			<div class="input-group">
				<input type="text" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<span class="glyphicon glyphicon-search"></span>
					</button> </span>
			</div>
		</div>
		<!-- /well -->
		<div class="well">
			<h4>Popular Blog Categories</h4>
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled">
						<li>
							<a href="#dinosaurs">Dinosaurs</a>
						</li>
						<li>
							<a href="#spaceships">Spaceships</a>
						</li>
						<li>
							<a href="#fried-foods">Fried Foods</a>
						</li>
						<li>
							<a href="#wild-animals">Wild Animals</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled">
						<li>
							<a href="#alien-abductions">Alien Abductions</a>
						</li>
						<li>
							<a href="#business-casual">Business Casual</a>
						</li>
						<li>
							<a href="#robots">Robots</a>
						</li>
						<li>
							<a href="#fireworks">Fireworks</a>
						</li>
					</ul>
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
<script src="{{ asset('js/css-switcher.js') }}" type="text/javascript"></script>
@stop
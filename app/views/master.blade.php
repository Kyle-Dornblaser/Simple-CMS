<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Coding Tuts - @yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Add custom CSS here -->
		<link href="{{ asset('css/blog-post.css') }}" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Coding Tuts</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="#about">About</a>
						</li>
						<li>
							<a href="#services">Services</a>
						</li>
						<li>
							<a href="#contact">Contact</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::guest())
						<li class="">
							{{ HTML::linkRoute('register', 'Register') }}
						</li>
						<li class="">
							{{ HTML::linkRoute('login', 'Login') }}
						</li>
						@elseif(Auth::check())
						@if(Auth::user() -> role == 'Admin')
						<li class="">
							{{ HTML::linkRoute('create', 'New Post') }}
						</li>
						@endif
						<li class="">
							{{ HTML::linkRoute('logout', 'Logout (' . Auth::user() -> first_name . ')') }}
						</li>
						@endif
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<div class="container">
			@if(Session::has('alert'))
			<div class="alert alert-dismissable {{ Session::get('alert-class') }}">
				<button type="button" class="close" data-dismiss="alert">
					×
				</button>
				{{ Session::get('alert') }}
			</div>
			@endif
			<div class="row">
				<div class="col-lg-8">

					<!-- the actual blog post: title/author/date/content -->
					@yield('content')

				</div>
				<div class="col-lg-4">
					<div class="well">
						<h4>Blog Search</h4>
						<!--<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button">
						<span class="glyphicon glyphicon-search"></span>
						</button> </span>

						</div>-->
						<script>
							(function() {
								var cx = '015930986522473052671:sjhwn6wc6zu';
								var gcse = document.createElement('script');
								gcse.type = 'text/javascript';
								gcse.async = true;
								gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//www.google.com/cse/cse.js?cx=' + cx;
								var s = document.getElementsByTagName('script')[0];
								s.parentNode.insertBefore(gcse, s);
							})();
						</script>
						<gcse:search></gcse:search>
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
						<h4>Side Widget Well</h4>
						<p>
							Bootstrap's default wells work great for side widgets! What is a widget anyways...?
						</p>
					</div>
					<!-- /well -->
				</div>
			</div>

			<hr>

			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>
							Copyright &copy; Company 2013
						</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<!-- JavaScript -->
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.js"></script>

	</body>

</html>

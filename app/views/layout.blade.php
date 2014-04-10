<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<script type="text/javascript" src="http://168.28.21.121:8081/team3/4-1-2014%20Archive/syntax/scripts/shCore.js"></script>
		<script type="text/javascript" src="http://168.28.21.121:8081/team3/4-1-2014%20Archive/syntax/scripts/shBrushCss.js"></script>
		<script type="text/javascript" src="http://168.28.21.121:8081/team3/4-1-2014%20Archive/syntax/scripts/shBrushXml.js"></script>
		<link type="text/css" rel="stylesheet" href="http://168.28.21.121:8081/team3/4-1-2014%20Archive/syntax/styles/shCoreDefault.css"/>

		<title>Coding Tuts - @yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Add custom CSS here -->
		<link href="{{ asset('css/blog-post.css') }}" rel="stylesheet">

		<style>
			h1 a, h1 a:hover {
				color: #000;
			}
		</style>
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
						<li>
							{{ HTML::linkRoute('register', 'Register') }}
						</li>
						<li>
							{{ HTML::linkRoute('login', 'Login') }}
						</li>
						@elseif(Auth::check())
						@if(Auth::user() -> role == 'Admin')
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="">
									{{ HTML::linkRoute('create', 'Create Post') }}
								</li>
								<li class="">
									{{ HTML::linkRoute('postAdmin', 'Moderate Posts') }}
								</li>
							</ul>
						</li>
						@endif
						<li>
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

			@yield('container')

			<hr>

			<footer>
				<div class="row">
					<div class="col-sm-12">
						<p>
							Copyright &copy; Coding-Tuts 2014
						</p>
						<p>
							<a href="https://github.com/Kyle-Dornblaser/Web-Development-Team">GitHub</a>
						</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<!-- JavaScript -->
		<script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
		<script type="text/javascript">
			SyntaxHighlighter.all();
		</script>
	</body>

</html>

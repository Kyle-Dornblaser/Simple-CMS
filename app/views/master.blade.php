<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('header')</title>
		<meta charset="UTF-8" />
		<link type="text/css" rel="stylesheet" href="stylesheets/style.css" />

		<style>
			.TextWrap {
				float: right;
				margin: 10px;
			}
		</style>
		<script type="text/javascript" src="syntax/scripts/shCore.js"></script>
		<script type="text/javascript" src="syntax/scripts/shBrushXml.js"></script>
		<script type="text/javascript" src="syntax/scripts/shBrushCss.js"></script>
		<link type="text/css" rel="stylesheet" href="syntax/styles/shCoreDefault.css"/>
		<link type="text/css" rel="stylesheet" href="syntax/styles/shCoreDefault.css"/>
		<script type="text/javascript">
			SyntaxHighlighter.all();
		</script>
	</head>
	<body>
		<div id="container">
			<header>
				<h1>@yield('header')</h1>
				<nav>
					<ul>
						<li>
							<a href="/">HOME</a>
						</li>
						<li>
							<a href="basics">BASICS</a>
						</li>
						<li>
							<a href="html">HTML</a>
						</li>
						<li>
							<a href="css">CSS</a>
						</li>
						<li>
							<a href="login">LOGIN</a>
						</li>
						<li>
							<a href="registration">REGISTRATION</a>
						</li>
						<li>
							<a href="contact">CONTACT</a>
						</li>
					</ul>
				</nav>
			</header>
			<section>
				@yield('content')
			</section>
			<footer>
				<nav id="footnav">
					<ul>
						<li>
							<a href="/">HOME</a>
						</li>
						<li>
							<a href="login">LOGIN</a>
						</li>
						<li>
							<a href="registration">REGISTRATION</a>
						</li>
						<li>
							<a href="contact">CONTACT</a>
						</li>
					</ul>
				</nav>
				<span id="copyright">Copyright &copy; 2014 Group 4</span>
			</footer>
		</div>
	</body>
</html>
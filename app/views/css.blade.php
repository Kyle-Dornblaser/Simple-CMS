@extends('master')

@section('header')
CSS - Making it pretty
@stop

@section('content')
<h1>Basic CSS</h1>
			<h3>Applying CSS</h3>
			<p>When writing CSS, you will need to know the basic structure to construct a CSS element.  The basic syntax is as follows: </p>
			<h4>Code</h4>
			<pre class="brush: css">
				selector { 
				  property: value; 
				}
			</pre>
			<br/>
			
			<p>CSS can be written in a .css file with just the css elementes themselves or it can be included into an HTML document using the &lt;style&gt; tag.</p>
			<h4>Code</h4>
			<pre class="brush: html">
				&lt;html&gt;
				&lt;head&gt;
				&lt;title&gt;CSS Example&lt;/title&gt;
				&lt;style&gt;
					p {
						color: red;
					}

					a {
						color: blue;
					}
				&lt;/style&gt;
				&lt;/head&gt;
			</pre>
			<br />
			
			<p>An external CSS file can be linked to an HTML file by using the following &lt;link&gt; tag.</p>
			<h4>Code</h4>
			<pre class="brush: html">
				&lt;html&gt;
				&lt;head&gt;
				&lt;title&gt;CSS Example&lt;/title&gt;
				&lt;link rel="stylesheet" href="style.css" /&gt;
				&lt;/head&gt;
			</pre>
@stop

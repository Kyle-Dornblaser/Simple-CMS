@extends('master')

@section('header')
HTML - Where it all begins
@stop

@section('content')
<h1>Basic HTML</h1>
<p>
	Let's get started with some of the tags you will be using in HTML.
</p>

<h2>The <strong>&lt;p&gt;</strong> tag is used to denote a paragraph.</h2>
<h3>Code</h3>
<pre class="brush: html">&lt;p&gt;This is an example of a paragraph.&lt;/p&gt;</pre>
<h3>Live Demo</h3>
<p>
	This is an example of a paragraph.
</p>

<h2>The <strong>&lt;strong&gt;</strong> tag is used to bold words.</h2>
<h3>Code</h3>
<pre class="brush: html">&lt;p&gt;This is an example of &lt;strong&gt;bolded words&lt;/strong&gt;.&lt;/p&gt;</pre>
<h3>Live Demo</h3>
<p>
	This is an example of <strong>bolded words</strong>.
</p>

<h2>The <strong>&lt;em&gt;</strong> tag is used to italicize words.</h2>
<h3>Code</h3>
<pre class="brush: html">&lt;p&gt;This is an example of &lt;em&gt;italicized words&lt;/em&gt;.&lt;/p&gt;</pre>
<h3>Live Demo</h3>
<p>
	This is an example of <em>italicized words</em>.
</p>

<h2>The <strong>&lt;table&gt;</strong> tag is used to create tables.</h2>
<h3>Code</h3>
<pre class="brush: html">
			&lt;table&gt;
				&lt;tr&gt;
					&lt;td&gt;1&lt;/td&gt;
					&lt;td&gt;2&lt;/td&gt;
					&lt;td&gt;3&lt;/td&gt;
				&lt;/tr&gt;
				&lt;tr&gt;
					&lt;td&gt;4&lt;/td&gt;
					&lt;td&gt;5&lt;/td&gt;
					&lt;td&gt;6&lt;/td&gt;
				&lt;/tr&gt;
				&lt;tr&gt;
					&lt;td&gt;7&lt;/td&gt;
					&lt;td&gt;8&lt;/td&gt;
					&lt;td&gt;9&lt;/td&gt;
				&lt;/tr&gt;
			&lt;/table&gt;</pre>
<h3>Live Demo</h3>
<table>
	<tr>
		<td>1</td>
		<td>2</td>
		<td>3</td>
	</tr>
	<tr>
		<td>4</td>
		<td>5</td>
		<td>6</td>
	</tr>
	<tr>
		<td>7</td>
		<td>8</td>
		<td>9</td>
	</tr>
</table>
@stop

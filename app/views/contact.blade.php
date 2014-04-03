@extends('master')

@section('header')
Contact Us
@stop

@section('content')
<p>
	Please use the following form to contact us or give us any feedback.
</p>
<form action="contact.html" method="post">
	<table>
		<tr>
			<td>Your name</td>
			<td>
			<input type="text" name="name" />
			</td>
		</tr>
		<tr>
			<td>Your email</td>
			<td>
			<input type="email" name="email" />
			</td>
		</tr>
		<tr>
			<td>Your message</td>
			<td>			<textarea></textarea></td>
		</tr>
		<tr>
			<td>
			<input type="submit" />
			</td>
			<td></td>
		</tr>
	</table>
</form>
@stop

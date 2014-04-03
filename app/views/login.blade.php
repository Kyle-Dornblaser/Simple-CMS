@extends('master')

@section('header')
Login
@stop

@section('content')
<form action="welcome.html" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td>
			<input type="text" placeholder="Username" name="username" />
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
			<input type="password" placeholder="Password" name="password" />
			</td>
		</tr>
		<tr>
			<td>
			<input type="submit" value="Login" />
			</td>
			<td></td>
		</tr>
	</table>
</form>
@stop

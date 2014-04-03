@extends('master')

@section('header')
Registration
@stop

@section('content')
<form action="registered.html" method="post" onsubmit="return validateInput()">
	<table>
		<tr>
			<td>Username:</td>
			<td>
			<input type="text" name="username" placeholder="User Name" required />
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
			<input type="email" name="email" id="email" placeholder="Email" required />
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
			<input type="password" name="password" id="password" placeholder="Password" required />
			</td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td>
			<input type="password" name="passwordcheck" id="passwordcheck" placeholder="Password" required />
			</td>
		</tr>
		<tr>
			<td>
			<input type="submit" name="submit" value="Submit" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function validateInput() {
		if (!validatePassword() || !validateEmail()) {
			return false;
		} else {
			return true;
		}
	}

	function validatePassword() {
		var pass1 = document.getElementById("password").value;
		var pass2 = document.getElementById("passwordcheck").value;
		if (pass1 != pass2) {
			document.getElementById("password").style.borderColor = "#E34234";
			document.getElementById("passwordcheck").style.borderColor = "#E34234";
			return false;
		} else {
			document.getElementById("password").style.borderColor = "#99CC00";
			document.getElementById("passwordcheck").style.borderColor = "#99CC00";
			return true;
		}
	}

	function validateEmail() {
		var email = document.getElementById("email").value;
		var regex = /\S+@\S+\.\S+/;
		if (!regex.test(email)) {
			document.getElementById("email").style.borderColor = "#E34234";
			return false;
		} else {
			document.getElementById("email").style.borderColor = "#99CC00";
			return true;
		}
	}
</script>
@stop

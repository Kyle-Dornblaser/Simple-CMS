@extends('master')

@section('content')

<div class="well">
	{{ Form::open(array('action' => 'UserController@register', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>
			<h2>Account Registration</h2>
		</legend>
		<div class="form-group">
			<div class="col-lg-6">
				{{ Form::text('first_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'First Name')) }}
			</div>
			<div class="col-lg-6">
				{{ Form::text('last_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'Last Name')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::email('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::password('confirm_password', array('class' => 'form-control input-lg', 'placeholder' => 'Confirm Password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<button class="btn btn-default">
					Cancel
				</button>
				<button type="submit" class="btn btn-primary">
					Sign up!
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>

@stop
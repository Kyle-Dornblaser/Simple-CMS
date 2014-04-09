@extends('master')

@section('content')

<div class="well">
	{{ Form::open(array('action' => 'UserController@login', 'id' => 'logInForm', 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>
			<h2>Login</h2>
		</legend>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<label class="control-label" style="padding-top: 0" for="remember"> {{ Form::checkbox('remember', 'remember', false, array('class' => 'checkbox-inline')) }}
					Keep me logged in </label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<button type="reset" class="btn btn-default btn-lg">
					Cancel
				</button>
				<button type="submit" class="btn btn-primary btn-lg">
					Login
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>

@stop
@extends('master')

@section('title')
Edit User
@stop

@section('content')

<div class="well">
	{{ Form::open( array('url' => route('editUser', array('id' => $user -> id)), 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>
			<h2>Edit User</h2>
		</legend>
		<div class="form-group">
			<div class="col-lg-6">
				{{ Form::text('first_name', $user -> first_name, array('class' => 'form-control input-lg', 'placeholder' => 'First Name', 'required' => '')) }}
			</div>
			<div class="col-lg-6">
				{{ Form::text('last_name', $user -> last_name, array('class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::email('email', $user -> id, array('class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::label('role', 'Role', array('control-label')) }}
				{{ Form::select('role', array('User' => 'User', 'Premium' => 'Premium', 'Admin' => 'Admin'), $user -> role, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<button type="submit" class="btn btn-primary">
					Save
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>

@stop
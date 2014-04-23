@extends('master')

@section('content')

<div class="well">
	{{ Form::open(array('action' => 'ContactController@send', 'id' => 'logInForm', 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>
			<h2>Contact Us</h2>
		</legend>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::textarea('content', '', array('class' => 'form-control input-lg', 'placeholder' => 'Your message', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<button type="reset" class="btn btn-default btn-lg">
					Cancel
				</button>
				<button type="submit" class="btn btn-primary btn-lg">
					Submit
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>

@stop

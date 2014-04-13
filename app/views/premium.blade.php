@extends('master')

@section('title')
Premium
@stop
@section('content')

<div class="well">
	{{ Form::open(array('action' => 'CreditCardController@save', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>
			<h2>Get Premium</h2>
			<p>
				It costs $10 for a lifetime subscription to all the premium content on this site!
			</p>
			<h2>Enter your billing information below:</h2>
		</legend>
		<div class="form-group">
			<div class="col-lg-6">
				{{ Form::text('first_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'First Name', 'required' => '')) }}
			</div>
			<div class="col-lg-6">
				{{ Form::text('last_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::text('card_number', '', array('class' => 'form-control input-lg', 'placeholder' => 'Card Number', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::text('verification', '', array('class' => 'form-control input-lg', 'placeholder' => 'Verification', 'required' => '')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				{{ Form::label('', 'Expiration:', array('control-label')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-6">
				{{ Form::selectMonth('month', '', array('class' => 'form-control input-lg')) }}
			</div>
			<div class="col-lg-6">
				{{ Form::selectYear('year', '2014', '2024', '', array('class' => 'form-control input-lg')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<button class="btn btn-default btn-lg" type="reset">
					Cancel
				</button>
				<button type="submit" class="btn btn-primary btn-lg">
					Buy Premium!
				</button>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>

@stop

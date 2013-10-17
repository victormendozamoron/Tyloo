@extends('layouts.default')

{{-- Page title --}}
@section('title')
Sign up - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Sign up</h3>
</div>

{{ Form::open(array('route' => 'register', 'class' => 'form-horizontal')) }}
	<div class="form-group{{ $errors->first('first_name', ' has-error', 'has-success') }}">
		{{ Form::label('first_name', 'First name', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('last_name', ' has-error') }}">
		{{ Form::label('last_name', 'Last name', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('email', ' has-error') }}">
		{{ Form::label('email', 'Email', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('email_confirm', ' has-error') }}">
		{{ Form::label('email_confirm', 'Email (confirm)', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::email('email_confirm', Input::old('email_confirm'), array('class' => 'form-control')) }}
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('password', ' has-error') }}">
		{{ Form::label('password', 'Password', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::password('password', array('class' => 'form-control')) }}
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('password_confirm', ' has-error') }}">
		{{ Form::label('password_confirm', 'Password (confirm)', array('class' => 'col-lg-2 col-lg-offset-2 control-label')) }}
		<div class="col-lg-4">
			{{ Form::password('password_confirm', array('class' => 'form-control')) }}
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit('Sign Up', array('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
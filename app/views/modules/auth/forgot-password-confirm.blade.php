@extends('layouts.default')

@section('content')
<div class="page-header">
	<h4>Forgot Password</h4>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('password', ' has-error', 'has-success') }}">
		{{ Form::label('password', 'New Password', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('password_confirm', ' has-error', 'has-success') }}">
		{{ Form::label('password_confirm', 'Password Confirmation', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('password_confirm', Input::old('password_confirm'), array('class' => 'form-control')) }}
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
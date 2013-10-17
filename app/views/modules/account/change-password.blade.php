@extends('layouts.account')

{{-- Page title --}}
@section('title')
Change your Password - @parent
@stop

{{-- Page content --}}
@section('account-content')
<div class="page-header">
	<h3>Change your Password</h3>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('old_password', ' has-error', 'has-success') }}">
		{{ Form::label('old_password', 'Old Password', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('old_password', Input::old('old_password'), array('class' => 'form-control')) }}
			{{ $errors->first('old_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('password', ' has-error', 'has-success') }}">
		{{ Form::label('password', 'New Password', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('password_confirm', ' has-error', 'has-success') }}">
		{{ Form::label('password_confirm', 'Confirm New Password', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('password_confirm', Input::old('password_confirm'), array('class' => 'form-control')) }}
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit('Update Password', array('class' => 'btn btn-primary')) }}
			<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
		</div>
	</div>
{{ Form::close() }}
@stop
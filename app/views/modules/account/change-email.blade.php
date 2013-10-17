@extends('layouts.account')

{{-- Page title --}}
@section('title')
Change your Email - @parent
@stop

{{-- Page content --}}
@section('account-content')
<div class="page-header">
	<h3>Change your Email</h3>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('email', ' has-error', 'has-success') }}">
		{{ Form::label('email', 'New Email', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('email_confirm', ' has-error', 'has-success') }}">
		{{ Form::label('email_confirm', 'Confirm New Email', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('email_confirm', Input::old('email_confirm'), array('class' => 'form-control')) }}
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('current_password', ' has-error', 'has-success') }}">
		{{ Form::label('current_password', 'Current Password', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('current_password', Input::old('current_password'), array('class' => 'form-control')) }}
			{{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit('Update Email', array('class' => 'btn btn-primary')) }}
			<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
		</div>
	</div>
{{ Form::close() }}
@stop
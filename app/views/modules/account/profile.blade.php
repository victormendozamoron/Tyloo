@extends('layouts.account')

@section('account-content')
<div class="page-header">
	<h4>Update your Profile</h4>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('first_name', ' has-error', 'has-success') }}">
		{{ Form::label('first_name', 'First name', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('first_name', Input::old('first_name', $user->first_name), array('class' => 'form-control')) }}
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('last_name', ' has-error') }}">
		{{ Form::label('last_name', 'Last name', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('last_name', Input::old('last_name', $user->last_name), array('class' => 'form-control')) }}
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit('Update your Profile', array('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
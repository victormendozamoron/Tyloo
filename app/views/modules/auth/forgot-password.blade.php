@extends('layouts.default')

@section('content')
<div class="page-header">
	<h4>Forgot Password</h4>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('email', ' has-error', 'has-success') }}">
		{{ Form::label('email', 'Email', array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
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
@extends('layouts.default')

{{-- Page content --}}
@section('content')
{{ Form::open(array('class' => 'form-horizontal blogpost_form', 'role' => 'form')) }}
	<div class="form-group{{ $errors->first('name', ' has-error', 'has-success') }}">
		{{ Form::label('name', 'Your name', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('name', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('email', ' has-error', 'has-success') }}">
		{{ Form::label('email', 'Your email', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('content', ' has-error', 'has-success') }}">
		{{ Form::label('content', 'Your message', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::textarea('content', Input::old('content'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('content', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-8">
			{{ Form::submit('Envoyer', array ('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
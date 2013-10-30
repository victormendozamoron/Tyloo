@extends('layouts.default')

{{-- Page title --}}
@section('title')
@lang('modules/contact/views.page_title') - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
  <h3>@lang('modules/contact/views.page_title')</h3>
</div>

{{ Form::open(array('class' => 'form-horizontal contact_form', 'role' => 'form')) }}
	<div class="form-group{{ $errors->first('name', ' has-error', 'has-success') }}">
		{{ Form::label('name', Lang::get('modules/contact/views.form.your_name'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('name', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('email', ' has-error', 'has-success') }}">
		{{ Form::label('email', Lang::get('modules/contact/views.form.your_email'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::email('email', Input::old('email'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('content', ' has-error', 'has-success') }}">
		{{ Form::label('content', Lang::get('modules/contact/views.form.your_message'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::textarea('content', Input::old('content'), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('content', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-8">
			{{ Form::submit(Lang::get('buttons.send'), array ('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
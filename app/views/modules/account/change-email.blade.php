@extends('layouts.account')

{{-- Page title --}}
@section('title')
@lang('modules/account/views.change_email.page_title') - @parent
@stop

{{-- Page content --}}
@section('account-content')
<div class="page-header">
	<h3>@lang('modules/account/views.change_email.change_email')</h3>
</div>

{{ Form::open(array('class' => 'form-horizontal', 'autocomplete' => 'off')) }}
	<div class="form-group{{ $errors->first('email', ' has-error', 'has-success') }}">
		{{ Form::label('email', Lang::get('modules/account/views.change_email.form.new_email'), array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('email_confirm', ' has-error', 'has-success') }}">
		{{ Form::label('email_confirm', Lang::get('modules/account/views.change_email.form.new_email_confirm'), array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('email_confirm', Input::old('email_confirm'), array('class' => 'form-control')) }}
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<div class="form-group{{ $errors->first('current_password', ' has-error', 'has-success') }}">
		{{ Form::label('current_password', Lang::get('modules/account/views.change_email.form.current_password'), array('class' => 'col-lg-4 control-label')) }}
		<div class="col-lg-4">
			{{ Form::text('current_password', Input::old('current_password'), array('class' => 'form-control')) }}
			{{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-lg-offset-4 col-lg-4 text-center">
			{{ Form::submit(Lang::get('buttons.submit'), array('class' => 'btn btn-primary')) }}
			<a href="{{ route('forgot-password') }}" class="btn btn-link">@lang('buttons.forgot_password')</a>
		</div>
	</div>
{{ Form::close() }}
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Edit a Page</h3>
</div>

{{ Form::open(array('method' => 'POST', 'route' => array('page.update', $page->id), 'files' => true, 'class' => 'form-horizontal blogpost_form', 'role' => 'form')) }}
	<div class="form-group{{ $errors->first('title', ' has-error', 'has-success') }}">
		{{ Form::label('title', 'Title', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('title', Input::old('title', isset($page) ? $page->title : null), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('title', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('slug', ' has-error', 'has-success') }}">
		{{ Form::label('slug', 'Slug', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('slug', Input::old('slug', isset($page) ? $page->slug : null), array('class' => 'form-control')) }}
			{{ $errors->first('slug', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('content', ' has-error', 'has-success') }}">
		{{ Form::label('content', 'Content', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			<div id="summernote">{{ HTML::decode(Input::old('content', isset($page) ? $page->content : '<p></p>')) }}</div>
			{{ Form::hidden('content', Input::old('content')) }}
			{{ $errors->first('content', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('draft', ' has-error', 'has-success') }}">
		{{ Form::label('draft', 'Draft?', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::checkbox('draft', Input::old('draft') ? Input::old('draft') : '1', $page->draft) }}
			{{ $errors->first('draft', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('in_menu', ' has-error', 'has-success') }}">
		{{ Form::label('in_menu', 'In Menu?', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::checkbox('in_menu', Input::old('in_menu'), $page->in_menu) }}
			{{ $errors->first('in_menu', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('lang', ' has-error', 'has-success') }}">
		{{ Form::label('lang', 'Lang', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::select('lang', array('fr' => 'French', 'en' => 'English'), Input::old('lang', isset($page) ? $page->lang : null), array('class' => 'form-control')) }}
			{{ $errors->first('lang', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-title', ' has-error', 'has-success') }}">
		{{ Form::label('meta-title', 'Meta Title', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-title', Input::old('meta-title', isset($page) ? $page->meta_title : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-keywords', ' has-error', 'has-success') }}">
		{{ Form::label('meta-keywords', 'Meta Keywords', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-keywords', Input::old('meta-keywords', isset($page) ? $page->meta_keywords : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-description', ' has-error', 'has-success') }}">
		{{ Form::label('meta-description', 'Meta Description', array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-description', Input::old('meta-description', isset($page) ? $page->meta_description : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-8">
			{{ Form::submit('Valider', array ('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
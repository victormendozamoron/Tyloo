@extends('layouts.default')

{{-- Page title --}}
@section('title')
@lang('modules/blog/views.edit.page_title') - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>@lang('modules/blog/views.edit.page_title')</h3>
</div>

{{ Form::open(array('method' => 'PUT', 'route' => array('blog.update', $post->id), 'files' => true, 'class' => 'form-horizontal blogpost_form', 'role' => 'form')) }}
	<div class="form-group{{ $errors->first('title', ' has-error', 'has-success') }}">
		{{ Form::label('title', Lang::get('modules/blog/views.form.'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('title', Input::old('title', isset($post) ? $post->title : null), array('class' => 'form-control col-lg-5')) }}
			{{ $errors->first('title', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('slug', ' has-error', 'has-success') }}">
		{{ Form::label('slug', Lang::get('modules/blog/views.form.slug'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('slug', Input::old('slug', isset($post) ? $post->slug : null), array('class' => 'form-control')) }}
			{{ $errors->first('slug', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('blogtags', ' has-error', 'has-success') }}">
		{{ Form::label('blogtags', Lang::get('modules/blog/views.form.tags'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('blogtags', Input::old('blogtags', $tags), array('class' => 'form-control')) }}
			{{ $errors->first('blogtags', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('image', ' has-error', 'has-success') }}">
		{{ Form::label('image', Lang::get('modules/blog/views.form.image'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
		@if (!empty($post->image))
	      <img src="{{ asset('uploads/blog_posts/' . $post->image) }}" class="pull-left">
	    @endif
			{{ Form::file('image') }}
			{{ $errors->first('image', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('content', ' has-error', 'has-success') }}">
		{{ Form::label('content', Lang::get('modules/blog/views.form.content'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			<div id="summernote">{{ HTML::decode(Input::old('content', isset($post) ? $post->content : '<p></p>')) }}</div>
			{{ Form::hidden('content', Input::old('content')) }}
			{{ $errors->first('content', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('draft', ' has-error', 'has-success') }}">
		{{ Form::label('draft', Lang::get('modules/blog/views.form.draft'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::checkbox('draft', Input::old('draft'), array('class' => 'form-control')) }}
			{{ $errors->first('draft', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('lang', ' has-error', 'has-success') }}">
		{{ Form::label('lang', Lang::get('modules/blog/views.form.lang'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::select('lang', array('fr' => 'French', 'en' => 'English'), Input::old('lang', isset($post) ? $post->lang : null), array('class' => 'form-control')) }}
			{{ $errors->first('lang', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-title', ' has-error', 'has-success') }}">
		{{ Form::label('meta-title', Lang::get('modules/blog/views.form.meta_title'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-title', Input::old('meta-title', isset($post) ? $post->meta_title : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-keywords', ' has-error', 'has-success') }}">
		{{ Form::label('meta-keywords', Lang::get('modules/blog/views.form.meta_keywords'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-keywords', Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group{{ $errors->first('meta-description', ' has-error', 'has-success') }}">
		{{ Form::label('meta-description', Lang::get('modules/blog/views.form.meta_description'), array('class' => 'col-lg-2 control-label')) }}
		<div class="col-lg-8">
			{{ Form::text('meta-description', Input::old('meta-description', isset($post) ? $post->meta_description : null), array('class' => 'form-control')) }}
			{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-8">
			{{ Form::submit(Lang::get('buttons.send'), array ('class' => 'btn btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}
@stop
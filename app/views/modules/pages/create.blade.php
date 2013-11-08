@extends('layouts.default')

@section('content')
<div class="page-header">
   <h3>@lang('modules/pages/views.create.page_title')</h3>
</div>
{{ Former::horizontal_open()->method('POST')->action(URL::route('pages.store'))->secure()->id('PageCreate')->rules(['title' => 'required', 'content' => 'required|min:3']) }}
   {{ Former::text('title')->required()->class('form-control')->label(Lang::get('modules/pages/forms.create.label.title'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.title'))->autofocus() }}

   {{ Former::text('slug')->class('form-control')->label(Lang::get('modules/pages/forms.create.label.slug'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.slug')) }}

   {{ Former::textarea('content')->required()->rows(10)->columns(20)->label(Lang::get('modules/pages/forms.create.label.content'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.content')) }}

   {{ Former::checkbox('in_menu')->label(Lang::get('modules/pages/forms.create.label.in_menu')) }}

   {{ Former::text('meta_title')->class('form-control')->label(Lang::get('modules/pages/forms.create.label.meta_title'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.meta_title')) }}

   {{ Former::text('meta_keywords')->class('form-control')->label(Lang::get('modules/pages/forms.create.label.meta_keywords'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.meta_keywords')) }}

   {{ Former::text('meta_description')->class('form-control')->label(Lang::get('modules/pages/forms.create.label.meta_description'))->placeholder(Lang::get('modules/pages/forms.create.placeholder.meta_description')) }}

   {{ Former::actions()->large_primary_submit(Lang::get('buttons.submit'))->large_default_reset(Lang::get('buttons.reset')) }}

{{ Former::close() }}
@stop
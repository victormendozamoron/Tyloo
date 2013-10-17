@extends('layouts.default')

{{-- Page title --}}
@section('title')
{{{ $page->title }}} - @parent
@stop

{{-- Update the Meta Title --}}
@section('meta.title')
{{{ $page->meta_title ? $page->meta_title : $page->title }}}
@stop

{{-- Update the Meta Description --}}
@section('meta.description')
{{{ $page->meta_description ? $page->meta_description : Config::get('app.settings.' . $locale . '.meta_description') }}}
@stop

{{-- Update the Meta Keywords --}}
@section('meta.keywords')
{{{ $page->meta_keywords ? $page->meta_keywords . ', ' : '' }}}
@parent
@stop

{{-- Page content --}}
@section('content')
@include('partials.post_edit', array('type' => 'page', 'id' => $page->id))
{{ HTML::decode($page->content) }}
@stop
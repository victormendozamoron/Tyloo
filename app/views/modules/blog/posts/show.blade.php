@extends('layouts.default')

{{-- Page title --}}
@section('title')
{{{ $blog_post->title }}} - @parent
@stop

{{-- Update the Meta Title --}}
@section('meta.title')
{{{ $blog_post->meta_title ? $blog_post->meta_title : $blog_post->title }}}
@stop

{{-- Update the Meta Description --}}
@section('meta.description')
{{{ $blog_post->meta_description ? $blog_post->meta_description : Config::get('app.settings.' . $locale . '.meta_description') }}}
@stop

{{-- Update the Meta Keywords --}}
@section('meta.keywords')
{{{ $blog_post->meta_keywords ? $blog_post->meta_keywords . ', ' : '' }}}
@parent
@stop

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'blog'))

<div class="panel panel-default">
  <div class="panel-heading">
  	{{{ $blog_post->title }}}
  </div>
  <div class="panel-body">
    @if (!empty($blog_post->image))
      <img src="{{ asset('uploads/blog_posts/' . $blog_post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($blog_post->content) }}
  </div>
  <div class="panel-footer">
  	@lang('modules/blog/views.posted_by')
    {{{ $blog_post->author->fullName() }}} | <i class="icon-calendar"></i> {{{ $blog_post->created_at->diffForHumans() }}} | @foreach($blog_post->tags as $tag) <a href="{{ URL::route('blog.postsByTag', array('slug' => $tag->slug)) }}" class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</a> @endforeach
  	@include('partials.post_edit', array('type' => 'blog', 'id' => $blog_post->id))
  </div>
</div>
@stop
@extends('layouts.default')

{{-- Page title --}}
@section('title')
{{{ $portfolio_post->title }}} - @parent
@stop

{{-- Update the Meta Title --}}
@section('meta.title')
{{{ $portfolio_post->meta_title ? $portfolio_post->meta_title : $portfolio_post->title }}}
@stop

{{-- Update the Meta Description --}}
@section('meta.description')
{{{ $portfolio_post->meta_description ? $portfolio_post->meta_description : Config::get('app.settings.' . $locale . '.meta_description') }}}
@stop

{{-- Update the Meta Keywords --}}
@section('meta.keywords')
{{{ $portfolio_post->meta_keywords ? $portfolio_post->meta_keywords . ', ' : '' }}}
@parent
@stop

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'portfolio'))

<div class="panel panel-default">
  <div class="panel-heading">
  	{{{ $portfolio_post->title }}}
  </div>
  <div class="panel-body">
    @if (!empty($portfolio_post->image))
      <img src="{{ asset('uploads/portfolio_posts/' . $portfolio_post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($portfolio_post->content) }}
  </div>
  <div class="panel-footer">
  	<i class="icon-calendar"></i> {{{ $portfolio_post->created_at->diffForHumans() }}} | @foreach($portfolio_post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach
  	@include('partials.post_edit', array('type' => 'portfolio', 'id' => $portfolio_post->id))
  </div>
</div>
@stop
@extends('layouts.default')

{{-- Page title --}}
@section('title')
Portfolio - @parent
@stop

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'portfolio'))
<div class="clearfix"></div>

@foreach($portfolio_posts as $portfolio_post)
<div class="panel panel-default">
  <div class="panel-heading">
  	<a href="{{ $portfolio_post->url() }}">{{{ $portfolio_post->title }}}</a>
  </div>
  <div class="panel-body">
    @if (!empty($portfolio_post->image))
      <img src="{{ asset('uploads/portfolio_posts/' . $portfolio_post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($portfolio_post->content) }}
    <a href="{{ $portfolio_post->url() }}" class="pull-right">View More...</a>
  </div>
  <div class="panel-footer">
  	<i class="icon-calendar"></i> {{{ $portfolio_post->created_at->diffForHumans() }}} | @foreach($portfolio_post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach
	  @include('partials.post_edit', array('type' => 'portfolio', 'id' => $portfolio_post->id))
  </div>
</div>
@endforeach
{{ $portfolio_posts->links() }}
@stop
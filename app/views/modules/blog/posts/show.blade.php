@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.blog_create')

<div class="panel panel-default">
  <div class="panel-heading">
  	{{{ $blog_post->title }}}
  </div>
  <div class="panel-body">
    @if (!empty($post->image))
      <img src="{{ asset('uploads/blog_posts/' . $post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($blog_post->content) }}
  </div>
  <div class="panel-footer">
  	Posted by {{{ $blog_post->author->first_name }}} {{{ $blog_post->created_at->diffForHumans() }}}
  	@include('partials.blog_edit', array('id' => $blog_post->id))
  </div>
</div>
@stop
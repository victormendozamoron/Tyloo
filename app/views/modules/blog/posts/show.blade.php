@extends('layouts.default')

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
  	Posted by {{{ $blog_post->author->first_name }}} {{{ $blog_post->created_at->diffForHumans() }}} | @foreach($blog_post->tags as $tag) <span class="label label-primary"><span class="glyphicon glyphicon-tag"></span> {{ $tag->name }}</span> @endforeach
  	@include('partials.post_edit', array('type' => 'blog', 'id' => $blog_post->id))
  </div>
</div>
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.blog_create')

@foreach($blog_posts as $blog_post)
<div class="panel panel-default">
  <div class="panel-heading">
  	<a href="{{ URL::route('blog.show', array('blog' => $blog_post->slug)) }}">{{{ $blog_post->title }}}</a>
  </div>
  <div class="panel-body">
    @if (!empty($blog_post->image))
      <img src="{{ asset('uploads/blog_posts/' . $blog_post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($blog_post->content) }}
    <a href="{{ URL::route('blog.show', array('blog' => $blog_post->slug)) }}" class="pull-right">View More...</a>
  </div>
  <div class="panel-footer">
  	Posted by {{{ $blog_post->author->first_name }}} {{{ $blog_post->created_at->diffForHumans() }}}
	  @include('partials.blog_edit', array('id' => $blog_post->id))
  </div>
</div>
@endforeach
@stop
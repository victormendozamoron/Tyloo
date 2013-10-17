@extends('layouts.default')

{{-- Page title --}}
@section('title')
Blog posts with tag "{{ $tag->name }}" - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
  <h3>@include('partials.post_create', array('type' => 'blog'))
  Blog posts with tag "{{ $tag->name }}"</h3>
</div>

@foreach($blog_posts as $blog_post)
<div class="panel panel-default">
  <div class="panel-heading">
  	<a href="{{ $blog_post->url() }}">{{{ $blog_post->title }}}</a>
  </div>
  <div class="panel-body">
    @if (!empty($blog_post->image))
      <img src="{{ asset('uploads/blog_posts/' . $blog_post->image) }}" class="pull-left">
    @endif
    {{ HTML::decode($blog_post->content) }}
    <a href="{{ $blog_post->url() }}" class="pull-right">View More...</a>
  </div>
  <div class="panel-footer">
  	Posted by {{{ $blog_post->author->first_name }}} | <i class="icon-calendar"></i> {{{ $blog_post->created_at->diffForHumans() }}} | @foreach($blog_post->tags as $tag) <a href="{{ URL::route('blog.postsByTag', array('slug' => $tag->slug)) }}" class="label label-primary"><<i class="icon-tag"></i> {{ $tag->name }}</a> @endforeach
	  @include('partials.post_edit', array('type' => 'blog', 'id' => $blog_post->id))
  </div>
</div>
@endforeach
{{ $blog_posts->links() }}
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'blog'))

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
  	Posted by {{{ $blog_post->author->fullName() }}} | <i class="icon-calendar"></i> {{{ $blog_post->created_at->diffForHumans() }}} | @foreach($blog_post->tags as $tag) <a href="{{ URL::route('blog.postsByTag', array('slug' => $tag->slug)) }}" class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</a> @endforeach
	  @include('partials.post_edit', array('type' => 'blog', 'id' => $blog_post->id))
  </div>
</div>
@endforeach
{{ $blog_posts->links() }}
@stop
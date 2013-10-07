@extends('layouts.default')

{{-- Page content --}}
@section('content')
@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
	<div class="text-right topbar_buttons">
		<a href="{{ URL::route('blog.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Create a Post</a>
	</div>
	@endif
@endif

@foreach($blog_posts as $post)
<div class="panel panel-default">
  <div class="panel-heading">
  	{{ $post->title }}
  </div>
  <div class="panel-body">
    {{ $post->content }}
    <a href="{{ URL::route('blog.show', array('blog' => $post->slug)) }}" class="pull-right">View More...</a>
  </div>
  <div class="panel-footer">
  	Posted by {{ $post->author->first_name }} {{ $post->created_at->diffForHumans() }}
	<a href="{{ URL::route('blog.edit', array('blog' => $post->id)) }}" class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</a>
  </div>
</div>
@endforeach
@stop
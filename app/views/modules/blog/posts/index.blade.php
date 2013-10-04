@extends('layouts.default')

{{-- Page content --}}
@section('content')
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
  </div>
</div>
@endforeach
@stop
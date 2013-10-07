@extends('layouts.default')

{{-- Page content --}}
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
  	{{{ $blog_post->title }}}
  </div>
  <div class="panel-body">
    {{ HTML::decode($blog_post->content) }}
  </div>
  <div class="panel-footer">
  	Posted by {{{ $blog_post->author->first_name }}} {{{ $blog_post->created_at->diffForHumans() }}}
  </div>
</div>
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
<ul>
    @foreach($blog_posts as $post)
        <li>{{ $post->title }} : {{ $post->content }}</li>
    @endforeach
</ul>
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'blog'))
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Tags</th>
      <th>Lang</th>
      <th>Draft</th>
      <th>Created at</th>
      <th>Author</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach($blog_posts as $post)
    <tr>
      <td>{{{ (strlen($post->title) > 30 ? substr($post->title, 0, 30) . '...' : $post->title) }}}</td>
      <td>@foreach($post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach</td>
      <td>{{{ $post->lang }}}</td>
      <td>{{{ ($post->draft ? 'Yes' : 'No') }}}</td>
      <td>{{{ date("d/m/Y H:i", strtotime($post->created_at)) }}}</td>
      <td>{{{ $post->author->fullName() }}}</td>
      <td>
      <div class="btn-group">
        <a href="{{ URL::route('blog.show', array('blog' => $post->slug)) }}" class="btn btn-info btn-xs" title="Show"><i class="icon-eye-open"></i></a>
        <a href="{{ URL::route('blog.edit', array('blog' => $post->id)) }}" class="btn btn-primary btn-xs" title="Edit"><i class="icon-edit"></i></a>
        <a href="{{ URL::route('blog.delete', array('id' => $post->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="icon-remove"></i></a>
        @if ($post->draft == true)
          <a href="{{ URL::route('blog.publish', array('id' => $post->id, 'state' => 0)) }}" class="btn btn-success btn-xs" title="Publish"><i class="icon-plus"></i></a>
        @else
          <a href="{{ URL::route('blog.publish', array('id' => $post->id, 'state' => 1)) }}" class="btn btn-warning btn-xs" title="Un-publish"><i class="icon-minus"></i></a>
        @endif
      </div>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
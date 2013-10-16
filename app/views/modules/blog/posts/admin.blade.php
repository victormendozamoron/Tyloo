@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'blog'))
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Slug</th>
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
      <td>{{{ $post->title }}}</td>
      <td>{{{ $post->slug }}}</td>
      <td>@foreach($post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach</td>
      <td>{{{ $post->lang }}}</td>
      <td>{{{ ($post->draft ? 'Yes' : 'No') }}}</td>
      <td>{{{ date("d/m/Y H:i", strtotime($post->created_at)) }}}</td>
      <td>{{{ $post->author->fullName() }}}</td>
      <td>
      <a href="{{ URL::route('blog.show', array('blog' => $post->slug)) }}" class="btn btn-info btn-xs"><i class="icon-eye-open"></i> Show</a>
      <a href="{{ URL::route('blog.edit', array('blog' => $post->id)) }}" class="btn btn-primary btn-xs"><i class="icon-edit"></i> Edit</a>
      {{ Form::open(array('method' => 'DELETE', 'route' => array('blog.destroy', $post->id), 'role' => 'form')) }}{{ Form::button('<i class="icon-remove"></i> Delete', array ('type' => 'submit', 'class' => 'btn btn-danger btn-xs')) }}{{ Form::close() }}
      @if ($post->draft == true)
        <a href="{{ URL::route('blog.publish', array('id' => $post->id, 'state' => 0)) }}" class="btn btn-success btn-xs"><i class="icon-plus"></i> Publish</a>
      @else
        <a href="{{ URL::route('blog.publish', array('id' => $post->id, 'state' => 1)) }}" class="btn btn-warning btn-xs"><i class="icon-minus"></i> UnPublish</a>
      @endif
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
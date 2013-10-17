@extends('layouts.default')

{{-- Page title --}}
@section('title')
Portfolio Management - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
  <h3>@include('partials.post_create', array('type' => 'portfolio'))
  Portfolio Management</h3>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Tags</th>
      <th>Lang</th>
      <th>Draft</th>
      <th>Created at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach($portfolio_posts as $post)
    <tr>
      <td>{{{ (strlen($post->title) > 30 ? substr($post->title, 0, 30) . '...' : $post->title) }}}</td>
      <td>@foreach($post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach</td>
      <td>{{{ $post->lang }}}</td>
      <td>{{{ ($post->draft ? 'Yes' : 'No') }}}</td>
      <td>{{{ date("d/m/Y H:i", strtotime($post->created_at)) }}}</td>
      <td>
      <a href="{{ URL::route('portfolio.show', array('portfolio' => $post->slug)) }}" class="btn btn-info btn-xs"><i class="icon-eye-open"></i> Show</a>
      <a href="{{ URL::route('portfolio.edit', array('portfolio' => $post->id)) }}" class="btn btn-primary btn-xs"><i class="icon-edit"></i> Edit</a>
      {{ Form::open(array('method' => 'DELETE', 'route' => array('portfolio.destroy', $post->id), 'role' => 'form')) }}{{ Form::button('<i class="icon-remove"></i> Delete', array ('type' => 'submit', 'class' => 'btn btn-danger btn-xs')) }}{{ Form::close() }}
      @if ($post->draft == true)
        <a href="{{ URL::route('portfolio.publish', array('id' => $post->id, 'state' => 0)) }}" class="btn btn-success btn-xs"><i class="icon-plus"></i> Publish</a>
      @else
        <a href="{{ URL::route('portfolio.publish', array('id' => $post->id, 'state' => 1)) }}" class="btn btn-warning btn-xs"><i class="icon-minus"></i> UnPublish</a>
      @endif
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.post_create', array('type' => 'page'))
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Title</th>
      <th>Slug</th>
      <th>Lang</th>
      <th>Draft</th>
      <th>In Menu</th>
      <th>Created at</th>
      <th>Author</th>
      <th>Actions</th>
  </thead>
  <tbody>
@foreach($pages as $page)
    <tr>
      <td>{{{ $page->title }}}</td>
      <td>{{{ $page->slug }}}</td>
      <td>{{{ $page->lang }}}</td>
      <td>{{{ ($page->draft ? 'Yes' : 'No') }}}</td>
      <td>{{{ ($page->in_menu ? 'Yes' : 'No') }}}</td>
      <td>{{{ date("d/m/Y H:i", strtotime($page->created_at)) }}}</td>
      <td>{{{ $page->author->fullName() }}}</td>
      <td>
      <a href="{{ URL::route('page.show', array('slug' => $page->slug)) }}" class="btn btn-info btn-xs"><i class="icon-eye-open"></i> Show</a>
      <a href="{{ URL::route('page.edit', array('id' => $page->id)) }}" class="btn btn-primary btn-xs"><i class="icon-edit"></i> Edit</a>
      <a href="{{ URL::route('page.destroy', array('id' => $page->id)) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i> Delete</a>
      @if ($page->draft == true)
        <a href="{{ URL::route('page.publish', array('id' => $page->id, 'state' => 0)) }}" class="btn btn-success btn-xs"><i class="icon-plus"></i> Publish</a>
      @else
        <a href="{{ URL::route('page.publish', array('id' => $page->id, 'state' => 1)) }}" class="btn btn-warning btn-xs"><i class="icon-minus"></i> UnPublish</a>
      @endif
      @if ($page->in_menu == true)
        <a href="{{ URL::route('page.inMenu', array('id' => $page->id, 'state' => 0)) }}" class="btn btn-warning btn-xs"><i class="icon-minus"></i> Menu : Delete</a>
      @else
        <a href="{{ URL::route('page.inMenu', array('id' => $page->id, 'state' => 1)) }}" class="btn btn-success btn-xs"><i class="icon-plus"></i> Menu : Add</a>
      @endif
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
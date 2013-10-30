@extends('layouts.default')

{{-- Page title --}}
@section('title')
@lang('modules/page/views.admin.page_title') - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
  <h3>@include('partials.post_create', array('type' => 'page'))
  @lang('modules/page/views.admin.page_title')</h3>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>@lang('modules/page/views.admin.title')</th>
      <th>@lang('modules/page/views.admin.lang')</th>
      <th>@lang('modules/page/views.admin.draft')</th>
      <th>@lang('modules/page/views.admin.in_menu')</th>
      <th>@lang('modules/page/views.admin.created_at')</th>
      <th>@lang('modules/page/views.admin.author')</th>
      <th>@lang('modules/page/views.admin.actions')</th>
    </tr>
  </thead>
  <tbody>
@foreach($pages as $page)
    <tr>
      <td>{{{ $page->title }}}</td>
      <td>{{{ $page->lang }}}</td>
      <td>{{{ ($page->draft ? 'Yes' : 'No') }}}</td>
      <td>{{{ ($page->in_menu ? 'Yes' : 'No') }}}</td>
      <td>{{{ date("d/m/Y H:i", strtotime($page->created_at)) }}}</td>
      <td>{{{ $page->author->fullName() }}}</td>
      <td>
      <div class="btn-group">
        <a href="{{ URL::route('page.show', array('slug' => $page->slug)) }}" class="btn btn-info btn-xs" title="@lang('modules/page/views.admin.show')"><i class="icon-eye-open"></i></a>
        <a href="{{ URL::route('page.edit', array('page' => $page->id)) }}" class="btn btn-primary btn-xs" title="@lang('modules/page/views.admin.edit')"><i class="icon-edit"></i> </a>
        <a href="{{ URL::route('page.destroy', array('page' => $page->id)) }}" class="btn btn-danger btn-xs" title="@lang('modules/page/views.admin.delete')"><i class="icon-remove"></i></a>
        @if ($page->draft == true)
          <a href="{{ URL::route('page.publish', array('id' => $page->id, 'state' => 0)) }}" class="btn btn-success btn-xs" title="@lang('modules/page/views.admin.publish')"><i class="icon-plus"></i></a>
        @else
          <a href="{{ URL::route('page.publish', array('id' => $page->id, 'state' => 1)) }}" class="btn btn-warning btn-xs" title="@lang('modules/page/views.admin.unpublish')"><i class="icon-minus"></i></a>
        @endif
        @if ($page->in_menu == true)
          <a href="{{ URL::route('page.inMenu', array('id' => $page->id, 'state' => 0)) }}" class="btn btn-warning btn-xs" title="@lang('modules/page/views.admin.menu_delete')"><i class="icon-minus"></i></a>
        @else
          <a href="{{ URL::route('page.inMenu', array('id' => $page->id, 'state' => 1)) }}" class="btn btn-success btn-xs" title="@lang('modules/page/views.admin.menu_add')"><i class="icon-plus"></i></a>
        @endif
      </div>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
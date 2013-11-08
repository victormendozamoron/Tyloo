@extends('layouts.default')

{{-- Page content --}}
@section('content')
<div class="page-header">
   <h3>@lang('modules/pages/views.index.page_title')
   <a href="{{ URL::route('pages.create') }}" class="btn btn-primary pull-right">@lang('buttons.add')</a>
   </h3>
</div>

<table class="table table-bordered">
   <thead>
      <tr>
         <th>@lang('modules/pages/views.index.title')</th>
         <th>@lang('modules/pages/views.index.created_at')</th>
         <th>@lang('modules/pages/views.index.author')</th>
         <th>@lang('modules/pages/views.index.actions')</th>
      </tr>
   </thead>
   <tbody>
   @foreach ($pages as $page)
      <tr>
         <td>{{{ $page->title }}}</td>
         <td>{{{ $page->created_at->diffForHumans() }}}</td>
         <td>{{{ $page->author->fullName() }}}</td>
         <td>
         <a href="{{ URL::route('pages.show', $page->slug) }}" class="btn btn-xs btn-primary"><i class="icon-eye-open"></i></a>
         <a href="{{ URL::route('pages.edit', $page->id) }}" class="btn btn-xs btn-primary"><i class="icon-edit"></i></a>
         <a href="{{ URL::route('pages.publish', $page->id) }}" class="btn btn-xs btn-primary"><i class="icon-arrow-up"></i></a>
         <a href="{{ URL::route('pages.destroy', $page->id) }}" class="btn btn-xs btn-danger"><i class="icon-remove"></i></a>
         </td>
      </tr>
   @endforeach
   </tbody>
</table>
@stop
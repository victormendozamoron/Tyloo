@extends('layouts.default')

{{-- Page title --}}
@section('title')
@lang('modules/portfolio/views.admin.page_title') - @parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
  <h3>@include('partials.post_create', array('type' => 'portfolio'))
  @lang('modules/portfolio/views.admin.page_title')</h3>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>@lang('modules/portfolio/views.admin.title')</th>
      <th>@lang('modules/portfolio/views.admin.tags')</th>
      <th>@lang('modules/portfolio/views.admin.lang')</th>
      <th>@lang('modules/portfolio/views.admin.draft')</th>
      <th>@lang('modules/portfolio/views.admin.created_at')</th>
      <th>@lang('modules/portfolio/views.admin.actions')</th>
    </tr>
  </thead>
  <tbody>
@foreach($portfolio_posts as $post)
    <tr>
      <td>{{{ (strlen($post->title) > 30 ? substr($post->title, 0, 30) . '...' : $post->title) }}}</td>
      <td>@foreach($post->tags as $tag) <span class="label label-primary"><i class="icon-tag"></i> {{ $tag->name }}</span> @endforeach</td>
      <td>{{{ $post->lang }}}</td>
      <td>{{{ $post->draft ? Lang::get('modules/portfolio/views.admin.yes') : Lang::get('modules/portfolio/views.admin.no') }}}</td>
      <td>{{{ $post->created_at->diffForHumans() }}}</td>
      <td>
      <div class="btn-group">
        <a href="{{ URL::route('portfolio.show', array('portfolio' => $post->slug)) }}" class="btn btn-info btn-xs" title="@lang('modules/portfolio/views.admin.show')"><i class="icon-eye-open"></i></a>
        <a href="{{ URL::route('portfolio.edit', array('portfolio' => $post->id)) }}" class="btn btn-primary btn-xs" title="@lang('modules/portfolio/views.admin.edit')"><i class="icon-edit"></i></a>
        <a href="{{ URL::route('portfolio.delete', array('id' => $post->id)) }}" class="btn btn-danger btn-xs" title="@lang('modules/portfolio/views.admin.delete')"><i class="icon-remove"></i></a>
        @if ($post->draft == true)
          <a href="{{ URL::route('portfolio.publish', array('id' => $post->id, 'state' => 0)) }}" class="btn btn-success btn-xs" title="@lang('modules/portfolio/views.admin.publish')"><i class="icon-plus"></i></a>
        @else
          <a href="{{ URL::route('portfolio.publish', array('id' => $post->id, 'state' => 1)) }}" class="btn btn-warning btn-xs" title="@lang('modules/portfolio/views.admin.unpublish')"><i class="icon-minus"></i></a>
        @endif
      </div>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop
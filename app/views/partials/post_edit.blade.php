@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
<a href="{{ URL::route($type . '.edit', $id) }}" class="btn btn-xs btn-info pull-right"><i class="icon-edit"></i> Edit</a>
	@endif
@endif
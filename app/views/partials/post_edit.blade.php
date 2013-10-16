@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
<a href="{{ URL::route($type . '.edit', $id) }}" class="btn btn-xs btn-info pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</a>
	@endif
@endif
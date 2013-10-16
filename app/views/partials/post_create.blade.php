@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
	<div class="text-right topbar_buttons">
		<a href="{{ URL::route($type . '.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Create a Post</a>
	</div>
	@endif
@endif
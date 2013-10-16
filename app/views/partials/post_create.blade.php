@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
	<div class="text-right topbar_buttons">
		<a href="{{ URL::route($type . '.create') }}" class="btn btn-primary"><i class="icon-pencil"></i> Create a Post</a>
	</div>
	@endif
@endif
@if (Sentry::check())
	@if(Sentry::getUser()->hasAccess('admin'))
	<div class="topbar_buttons pull-right">
		<a href="{{ URL::route($type . '.create') }}" class="btn btn-primary"><i class="icon-pencil"></i> Create a Post</a>
	</div>
	@endif
@endif
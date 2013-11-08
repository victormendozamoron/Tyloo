@extends('layouts.default')

{{-- Page content --}}
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="page-header">
			<h3>@lang('modules/account/views.layout.main_menu')</h3>
		</div>
		<ul class="nav nav-pills nav-stacked">
			<li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::route('profile') }}">@lang('modules/account/views.profile.page_title')</a></li>
			<li{{ Request::is('account/change-password') ? ' class="active"' : '' }}><a href="{{ URL::route('change-password') }}">@lang('modules/account/views.change_password.page_title')</a></li>
			<li{{ Request::is('account/change-email') ? ' class="active"' : '' }}><a href="{{ URL::route('change-email') }}">@lang('modules/account/views.change_email.page_title')</a></li>
		</ul>
	</div>
	<div class="col-md-9">
		@yield('account-content')
	</div>
</div>
@stop
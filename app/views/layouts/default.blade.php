<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <title>Tyloo.fr</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" type="text/css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ asset('assets/js/html5shiv.js') }}"></script>
      <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ (Request::is('/') ? '#' : URL::route('home')) }}">Tyloo.fr</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            @foreach($menu as $menu_page)
              <li><a href="{{ $menu_page->url() }}">{{ $menu_page->title }}</a></li>
            @endforeach
          </ul>

          <ul class="nav navbar-nav pull-right">
            @if (Sentry::check())
            <li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
              <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
              @lang('commons.welcome')
, {{ Sentry::getUser()->first_name }}
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                @if(Sentry::getUser()->hasAccess('admin'))
                <li role="presentation" class="dropdown-header">@lang('commons.menu.administration')</li>
                <li><a href="#"><i class="icon-cog"></i> @lang('commons.menu.website_settings')</a></li>
                <li class="divider"></li>
                <li role="presentation" class="dropdown-header">@lang('commons.menu.add')</li>
                <?php /*<li><a href="{{ URL::route('blog.create') }}"><i class="icon-pencil"></i> @lang('commons.menu.blog_create')</a></li>*/ ?>
                <?php /*<li><a href="{{ URL::route('portfolio.create') }}"><i class="icon-pencil"></i> @lang('commons.menu.portfolio_create')</a></li>*/ ?>
                <li><a href="{{ URL::route('pages.create') }}"><i class="icon-pencil"></i> @lang('commons.menu.page_create')</a></li>
                <li class="divider"></li>
                <li role="presentation" class="dropdown-header">@lang('commons.menu.list')</li>
                <?php /*<li><a href="{{ URL::route('blog.admin') }}"><i class="icon-list"></i> @lang('commons.menu.blog_list')</a></li>*/ ?>
                <?php /*<li><a href="{{ URL::route('portfolio.admin') }}"><i class="icon-list"></i> @lang('commons.menu.portfolio_list')</a></li>*/ ?>
                <li><a href="{{ URL::route('pages.index') }}"><i class="icon-list"></i> @lang('commons.menu.page_list')</a></li>
                @endif
                <li class="divider"></li>
                <li role="presentation" class="dropdown-header">@lang('commons.menu.account')</li>
                <li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> @lang('commons.menu.profile')</a></li>
                <li><a href="{{ route('logout') }}"><i class="icon-off"></i> @lang('commons.menu.logout')</a></li>
              </ul>
            </li>
            @else
            <li {{ (Request::is('auth/login') ? 'class="active"' : '') }}><a href="{{ route('login') }}">@lang('commons.menu.login')</a></li>
            <li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('register') }}">@lang('commons.menu.register')</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Notifications -->
      @include('partials.notifications')

      <!-- Content -->
      @yield('content')
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>
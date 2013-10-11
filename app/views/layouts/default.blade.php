<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <title>Tyloo.fr</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-tagsinput.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/summernote.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" type="text/css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

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
            <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ (Request::is('/') ? '#' : URL::route('home')) }}">Home</a></li>
            <li {{ (Request::is('cv') ? 'class="active"' : '') }}><a href="{{ (Request::is('') ? '#' : '#') }}" data-toggle="tooltip" data-placement="bottom" title="Soon &#0153;">CV</a></li>
            <li {{ (Request::is('skills') ? 'class="active"' : '') }}><a href="{{ (Request::is('') ? '#' : '#') }}" data-toggle="tooltip" data-placement="bottom" title="Soon &#0153;">Skills</a></li>
            <li {{ (Request::is('portfolio') ? 'class="active"' : '') }}><a href="{{ (Request::is('') ? '#' : '#') }}" data-toggle="tooltip" data-placement="bottom" title="Soon &#0153;">Portfolio</a></li>
            <li {{ (Request::is('about-me') ? 'class="active"' : '') }}><a href="{{ (Request::is('') ? '#' : '#') }}" data-toggle="tooltip" data-placement="bottom" title="Soon &#0153;">About me</a></li>
            <li {{ (Request::is('blog') ? 'class="active"' : '') }}><a href="{{ (Request::is('blog') ? '#' : URL::route('blog.index')) }}">Blog</a></li>
            <li {{ (Request::is('contact') ? 'class="active"' : '') }}><a href="{{ (Request::is('contact') ? '#' : URL::route('contact')) }}">Get in touch!</a></li>
          </ul>

          <ul class="nav navbar-nav pull-right">
            @if (Sentry::check())
            <li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
              <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
              Welcome, {{ Sentry::getUser()->first_name }}
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                @if(Sentry::getUser()->hasAccess('admin'))
                <li><a href="#"><i class="icon-cog"></i> Administration</a></li>
                @endif
                <li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
              </ul>
            </li>
            @else
            <li {{ (Request::is('auth/login') ? 'class="active"' : '') }}><a href="{{ route('login') }}">Sign in</a></li>
            <li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('register') }}">Sign up</a></li>
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
  </body>
</html>
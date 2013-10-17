@extends('layouts.default')

{{-- Page title --}}
@section('title')
Sign in - @parent
@stop

{{-- Page content --}}
@section('content')
{{ Form::open(array('route' => 'login', 'class' => 'form-login')) }}
	<h2 class="form-login-heading">Please sign in</h2>
	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email adress')) }}
	{{ Form::password('password', array ('class' => 'form-control', 'placeholder' => 'Password')) }}
	<label class="checkbox">
		{{ Form::checkbox('remember-me') }} Remember me
    </label>
	{{ Form::submit('Log me in!', array('class' => 'btn btn-lg btn-primary btn-block')) }}
	<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
{{ Form::close() }}
@stop
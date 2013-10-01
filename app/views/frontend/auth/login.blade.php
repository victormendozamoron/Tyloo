@extends('layouts.default')

{{-- Page content --}}
@section('content')
{{ Form::open(array('route' => 'login', 'class' => 'form-login')) }}
	<h2 class="form-login-heading">Please sign in</h2>
	{{ $errors->first('email', '<div class="alert alert-danger"><strong>Error!</strong> :message</div>') }}
	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email adress')) }}
	{{ Form::password('password', array ('class' => 'form-control', 'placeholder' => 'Password')) }}
	<label class="checkbox">
		{{ Form::checkbox('remember-me') }} Remember me
    </label>
	{{ Form::submit('Log me in!', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop
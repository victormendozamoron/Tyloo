@extends('layouts.default')

{{-- Page content --}}
@section('content')
{{ Form::open(array('route' => 'blog.store')) }}
	<ul>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}
@stop
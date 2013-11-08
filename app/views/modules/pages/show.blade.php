@extends('layouts.default')

{{-- Page content --}}
@section('content')
{{ HTML::decode($page->content) }}
@stop
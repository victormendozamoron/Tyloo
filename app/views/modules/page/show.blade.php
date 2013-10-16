@extends('layouts.default')

{{-- Page content --}}
@section('content')
@include('partials.post_edit', array('type' => 'page', 'id' => $page->id))
{{ HTML::decode($page->content) }}
@stop
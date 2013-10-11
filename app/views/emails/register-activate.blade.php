@extends('layouts.email')

@section('content')
<p>Hello {{ $user->first_name }},</p>
<p>Welcome to SiteNameHere! Please click on the following link to confirm your SiteNameHere account:</p>
<p><a href="{{ $activationUrl }}">{{ $activationUrl }}</a></p>
<p>Best regards,</p>
<p>The Tyloo.fr Team</p>
@stop
@extends('layouts.email')

@section('content')
<p>Hello {{ $user->first_name }},</p>
<p>Please click on the following link to updated your password:</p>
<p><a href="{{ $forgotPasswordUrl }}">{{ $forgotPasswordUrl }}</a></p>
<p>Best regards,</p>
<p>The Tyloo.fr Team</p>
@stop
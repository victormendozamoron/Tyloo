@extends('layouts.email')

@section('content')
<p>Hello Commander,</p>
<p>You've got a new contact request from Tyloo.fr:</p>
<p><strong>Name</strong> : {{ $name }}</p>
<p><strong>Email</strong> : {{ $email }}</p>
<p><strong>Message</strong> : {{ $content }}</p>
<p>Best regards,</p>
<p>The Tyloo.fr Team</p>
@stop
@extends('layouts.app')
@section('og-image')
<meta property="og:image" content="{{ asset('vendor/images/indexthumbnail.png')}}" />
@endsection
{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/homepage.css')}}">
@endsection
@section('content')
<body
style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;
">

    <div class="container text-center border rounded border-success bg-dark">
        <div><a href="/messages/MyMessages" class="btn btn-secondary my-3">Messages</a></div>
        <div> <a href="#" class="btn btn-warning my-3">Share Profile</a></div>
        <div> <a href="https://wa.me/?text=Hello, I am PLACEHOLDER, Send me an anonynous message on https://bojuboju.com/username" class="btn btn-success my-3">Share To Whatsapp</a></div>
        <div><a href="#" class="btn btn-primary my-3">Share To Facebook</a></div>
        <div><a href="#" class="btn btn-info my-3">Profile Settings</a></div>
        <div><a href="#" class="btn btn-danger my-3">Logout</a></div>
    </div>
</body>
@endsection

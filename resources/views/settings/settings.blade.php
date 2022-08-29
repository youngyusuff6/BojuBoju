@extends('layouts.app')
@section('title') Settings @endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/settings.css')}}">
@endsection
@section('content')
<body
style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
">


 <div class="container text-left mt-5 ">
            <a href="/messages" class="btn border-0 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi back-icon bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
        </div>
    <div class="container bg-transparent buttons border-0 mt-5 ms-auto me-auto">
    <div class="container  text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Username</a>
        </div>
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Email</a>
        </div>

        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Password</a>
        </div>



    </div> <div class="container text-center mt-3 ms-auto me-auto">
            <a href="#" class="btn btn-danger">Delete Account</a>
        </div>
</body>
@endsection

@extends('layouts.app')
@section('title') Settings @endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/settings.css')}}">
@endsection
@section('content')
 <div class="container text-left mt-5 ">
            <a href="/messages" class="btn btn-success">Go back</a>
        </div>
    <div class="container bg-transparent border-0 mt-5 ms-auto me-auto">
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn btn-info">Change Password</a>
        </div>
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="#" class="btn btn-danger">Delete Account</a>
        </div>


    </div>

@endsection

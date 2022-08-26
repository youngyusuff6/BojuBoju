@extends('layouts.app')
@section('title') Settings @endsection
@section('content')
    
    <div class="container bg-dark border ms-auto me-auto">
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn btn-danger">Change Password</a>
        </div>
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="#" class="btn btn-danger">Delete Account</a>
        </div>
        <div class="container text-center mt-5 ms-auto me-auto">
            <a href="/messages" class="btn btn-success">Go back</a>
        </div>

    </div>

@endsection
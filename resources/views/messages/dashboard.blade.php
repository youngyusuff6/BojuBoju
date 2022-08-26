@extends('layouts.app')
@section('title') Dashboard @endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/dashboard.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="lead">Good {{$timeOfTheDay}}, <span class="text-warning">{{$name}}</span></h1>
    </div>
    <div class="card-body">
        <p>You're logged in!</p>
    </div>
</div>
    <div class="container text-center border rounded border-success bg-dark">
        <div><a href="/messages/MyMessages" class="btn btn-secondary my-3">Messages</a></div>
        <div> <a href="#" class="btn btn-warning my-3">Share Profile</a></div>
        <div> <a href="https://api.whatsapp.com/send?text=Hello, I am {{$username}}, Send me an anonynous message on https://bojuboju.com/{{$username}}" class="btn btn-success my-3">Share To Whatsapp</a></div>
        <div><a href="https://www.facebook.com/sharer/?u=/{{$username}}" class="btn btn-primary my-3">Share To Facebook</a></div>
        <div><a href="/settings" class="btn btn-info my-3">Profile Settings</a></div>
        <div>
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn btn-danger my-3">
                    Logout
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
        </div>

            {{-- MODALLLLL --}}



            {{-- MODALLLLL --}}


    </div>
@endsection

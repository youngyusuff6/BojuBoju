@extends('layouts.app')
@section('content')
    <div class="container text-center border-0 rounded  bg-transparent">
       <a href="#" class="btn btn-warning my-3">Share Profile</a>
         <a href="https://api.whatsapp.com/send?text=Hello, I am {{$username}}, Send me an anonynous message on https://bojuboju.com/{{$username}}" class="btn btn-success my-3">Share To Whatsapp</a>
        <a href="https://www.facebook.com/sharer/?u=/{{$username}}" class="btn btn-primary my-3">Share To Facebook</a>

        <div>

        <div class="messages">  <a href="/messages/MyMessages" class="btn btn-secondary my-3">Messages</a>
         </div>
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

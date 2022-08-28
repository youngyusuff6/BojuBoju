@extends('layouts.app')
@section('title') Home @endsection
{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/index.css')}}">
@endsection
@section('content')

<div class="body">
    <div  style="width:100%; " class="card rounded border-0 bg-transparent ms-auto me-auto">
        <div style="width:100%; " class="card-body mt-3 rounded  ms-auto me-auto">
           <div class="text-center mt-5 mb-2 intro-header">
             <p>
                <h1>Welcome to
                  <br> <b>BojuBoju </b> <br> Anonymous messages</h1>

            </p>
            <p class="headers-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eligendi accusantium aspernatur ipsum, natus tenetur similique dolor ex magnam
            fugiat, ad facere repudiandae voluptatem est alias cupiditate amet iste. Similique, magni.</p>

         <a  href="{{ route('register') }}" class="btn fs-3 ">GET STARTED</a>
        </div>

        <div class="text-center mt-5">
            <h1 class="mt-5 pt-5">About BojuBoju</h1>
            p
        </div>

        </div>
    </div>
</div>

</body>

@endsection

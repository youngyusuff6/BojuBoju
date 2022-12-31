

@extends('layouts.app')
@section('title') Change Email Address Address @endsection

@section('og-image')
<meta property="og:image" content="{{ asset('vendor/images/indexthumbnail.png')}}" />
@endsection
{{-- MAIN CONTENTS --}}

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/changeuser.css')}}">
@endsection
@section('content')
<div class="container text-left" style="
    background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;
">


<div >
    <a href="{{route('changeSettings')}}" class="btn border-0 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi back-icon bi-arrow-left-circle-fill" viewBox="0 0 16 16">
<path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 changeuser-body">
            <div class="card border-0  bg-transparent" >
                    <div class="text-center text-default pt-4"><h1>Change Email Address</h1></div>
                <div class="card-body border-0 bg-transparent changeuser-form body">

                    <form class="form-horizontal" method="POST" action="{{ route('showChangeUsernamePost') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="current_email" class="col-md-4 changeuser-label col-form-label text-md-end">Current Email</label>

                            <div class="col-md-6">
                                <input id="current_email" type="email" class="form-control @error('current_email') is-invalid @enderror" name="current_email" value="{{ $username }}" readonly autofocus>

                                @error('current_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 changeuser-label col-form-label text-md-end">New Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ @old('new-username') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn changeuser-button"> Change Email Address</button>

                            </div>
                        </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection

{{-- ADD JS HERE OR IMPORT --}}
@section('scripts')

@endsection

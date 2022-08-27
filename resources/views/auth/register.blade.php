@extends('layouts.app')
@section('title') Register @endsection


{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/register.css')}}">
@endsection

@section('content')

<body>


<div class="container" id="form">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card register-form">

                <div class="card-header  register-form-header bg-transparent">{{ __('Sign Up Now') }}</div>

                <div class="card-body form-body" id="form" >
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label register-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off"  id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label register-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off"  id="username" type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label register-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off"  id="email" type="email" class="register-email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 register-label col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off"  id="password" type="password" class="form-control .register-password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"  class="register-label col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input autocomplete="off"  id="password-confirm" type="password" class="form-control register-confirm-password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn register-button">
                                    {{ __('Register') }}
                              <span class="spinner-border spinner-border-sm" id="button-loader" role="status" aria-hidden="true"></span>
                              </button>
                            </div>
                              <!-- register-button hover tranition effect -->
                              <div class="registration-transition" id="formtransition">
                                 </div>
                            </div>
                       <div class="d-flex mt-4 registration-footer">
                            <li > <p>if you have an Account already</p>

                         <a class="nav-link" href="{{ route('login') }}">  {{ __('Click here') }}</a>
                                </li></div>
                        </div>
                    </form>
                </div>   <!-- side-card transition effect -->
                                        <div class="side-card">
                                    <ul >
                                    <li> Asusred Anonymity</li>
                                        <li>Seamles User Experience</li>
                                        <li>And More </li>
                                    </ul>
            </div>

        </div>

    </div>
</div>

</body>
@endsection
 </div>

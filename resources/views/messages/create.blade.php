@extends('layouts.app')
@section('title') Write a Message @endsection
@section('styles')

@endsection
@section('scripts')
@endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/create.css')}}">
@endsection
@section('content')
<body
style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;
">

    <p>
        @if (Session::has('message'))
            <div class="alert alert-success">
                <h2>{{Session::get('message')}}</h2>
            </div>
        @endif
    </p>
    <div class="container border rounded ms-auto me-auto">
        <div class="text-center mx-3"><h3 class="lead display-5">Write anonymously..</h3></div>
        <div>
            <form action='/messages' method="post" enctype="multipart/form-data">
                @csrf

                <input
                type="hidden"
                name="username"
                value="{{$username['username']}}">
                <div class="form-group mb-2">

                    <textarea
                    name='message'
                    class="form-control"
                    placeholder="Send your text here"
                    rows="10">
                    {{@old('message')}}
                    </textarea>
                    @error('message')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <input type="file" name="image">
                    @error('image')
                    <p class="text-danger">
                        <small>{{ $message }}</small>
                    </p>
                    @enderror
                </div>

                <div>
                    <input type="submit" class="btn btn-success mt-4" value="Send Message">
                </div>
            </form>
        </div>


    </div>
</body>
@endsection

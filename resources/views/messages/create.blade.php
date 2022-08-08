@extends('layouts.app')
@section('title') Write a Message @endsection
@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')
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

                <div class="form-group">
                    <input type="hidden" name="username" value="{{$username['username']}}">
                    <textarea name="message" class="form-control" placeholder="Send your text here" min="10" maxlength="400" id="" cols="20" rows="10" required></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mt-1">
                    <input type="file" name="image">
                </div>

                <div>
                    <input type="submit" class="btn btn-success mt-4" value="Send Message">
                </div>
            </form>
        </div>

        
    </div>
@endsection
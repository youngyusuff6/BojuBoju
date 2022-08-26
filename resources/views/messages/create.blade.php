@extends('layouts.app')
@section('content')
    <h1>Hi {{$username['username']}}</h1>
    <div class="container border rounded ms-auto me-auto">
        <div class="text-center mx-3"><h3 class="lead display-5">Write anonymously..</h3></div>
        <div>
            <form action='/messages' method="post">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="username" value="{{$username['username']}}">
                    <textarea name="message" class="form-control" placeholder="Send your text here" id="" cols="20" rows="10"></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Send Message">
                </div>
            </form>
        </div>

        
    </div>
@endsection
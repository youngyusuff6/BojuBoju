@extends('layouts.app')
@section('title') My Messages @endsection
@section('content')

    <div>
        <a href="/messages" class="btn btn-secondary">Go back</a>
    </div>
@if (count($messages) > 0)

@foreach($messages as $message)
<div class="container text-center">
    <div class="card bg-light mb-3  ms-auto me-auto mt-2 rounded border-dark" style="max-width: 18rem;">
        <div class="card-header text-start">Message:</div>
        <div class="card-body">
          <p class="card-text">{{$message->message}}</p>
          <p>
              @if ($message->image)
              <div class="card">
               <a href="{{asset('storage/'.$message->image)}}" target="_blank"><img class="card-img-bottom" src="{{asset('storage/'.$message->image)}}" alt="message_img" style="width:100%"></a> 
                <div class="card-body">
                </div>
            </div>
            @else
            -No images attached
              @endif
            </p>
          <p>-BojuBoju [@ {{$message->created_at}}]</p>
          <div class="card-footer bg-transparent">
              <a href="#" class="btn rounded btn-secondary w-100 rounded-pill">Share response</a>
          </div>
        </div>
      </div>
</div>

@endforeach
@else
<div class="container text-center">
    <div class="card bg-light mb-3  ms-auto me-auto mt-2 rounded border-dark" style="max-width: 18rem;">
        <div class="card-header text-start">No recent messages</div>
      </div>
@endif
<div class="pagination justify-content-center">
    {{$messages->links()}}    
</div>
@endsection
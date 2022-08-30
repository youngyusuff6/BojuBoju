@extends('layouts.app')
@section('title') My Messages @endsection

@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/mymessages.css')}}">
@endsection

<body
style=" background-image: url('');
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size:cover;">

@section('content')

<div>

    <div>
        <a href="/messages" class="btn border-0 back-btn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi back-icon bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
    </div>
@if (count($messages) > 0)

@foreach($messages as $message)
<div class="container text-center">
    <div class="card message-box   ms-auto me-auto mt-5 rounded border-2" style="max-width: 20rem;">
        <div class="card-header fs-5 text-start">Message:</div>
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
          <div class="card-footer message-box bg-transparent">
              <a href="#" class="btn rounded border-0  w-100 rounded-pill">Share response</a>
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
</div></div>
@endsection</body>

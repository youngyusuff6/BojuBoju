@extends('layouts.app')
@section('title') MyMessages  @endsection
{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
<link rel="stylesheet" href="{{url('vendor/css/mymessages.css')}}">

@endsection
@section('content')

<div class="body bg-primary" >



<div class="col-12">



    <div>
        <a href="/messages" class="btn border-0 back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi back-icon bi-arrow-left-circle-fill" viewBox="0 0 16 16"><path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/></svg>
  </a>
    </div>
@if (count($messages) > 0)

@foreach($messages as $message)
<div class="container text-center">
    <div class="card message-box   ms-auto me-auto mt-5 rounded border-2" style="max-width: 20rem;">
        <div class="card-header fs-5 text-start">Message:</div>
        <div class="card-body">
          <p class="card-text">{{$message->message}}</p>

          @if ($message->image)
<<<<<<< HEAD
 <div class="accordion col-11 ms-4 mt-1 bg-transparent"  id="accordionPanelsStayOpenExample">
  <div class="accordion-item border-0  bg-transparent">
    <h2 class="accordion-header  border-0 step-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button bg-transparent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{"_".$message->id}}" aria-expanded="true" aria-controls="collapseOne">
        Image
      </button>
    </h2>
      <div id="collapseOne{{"_".$message->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPanelsStayOpenExample">
    <div class="accordion-body border-0 image-dropdown">
          <div class="card border-0 image-dropdown">
                <a href="{{asset('storage/'.$message->image)}}" target="_blank"><img class="card-img-bottom" src="{{asset('storage/'.$message->image)}}" alt="message_img" style="width:100%"></a>
                  <div class="card-body">
                  </div>
              </div>
    </div>
  </div>
</div>
=======
           <div class="accordion col-11 ms-4 mt-1 bg-transparent"  id="accordionPanelsStayOpenExample">
                <div class="accordion-item border-0  bg-transparent">
                    <h2 class="accordion-header  border-0 step-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Image
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPanelsStayOpenExample">
                    <div class="accordion-body border-0 image-dropdown">
                        <div class="card border-0 image-dropdown">
                                <a href="{{asset('storage/'.$message->image)}}" target="_blank"><img class="card-img-bottom" src="{{asset('storage/'.$message->image)}}" alt="message_img" style="width:100%"></a>
                                <div class="card-body">
                                </div>
                            </div>
                    </div>
                </div>
                </div>

>>>>>>> 3f460c5470bb22560e88b8ed0d77e11c29582982

            @else
            <p>
            {{-- -No images attached --}}
          </p>
          @endif


                <p class="mt-1 mb-1">-BojuBoju [@ {{$message->created_at}}]</p>
                <div class="card-footer message-box bg-transparent">
              <a href="#" class="btn rounded mt-2 border-0  w-100 rounded-pill">Share response</a>
          </div>
        </div>
      </div>
</div>

@endforeach
@else
<div class="container text-center">
    <div class="card bg-light mb-3  ms-auto me-auto mt-2 rounded border-dark" style="max-width: 18rem;">
        <div class="card-header message-box rounded border-2 text-light" style="max-width: 20rem;">No recent messages</div>
      </div>
@endif
<div class="pagination justify-content-center mt-3">
    {{$messages->links()}}
</div>


</div></div></div>

@endsection

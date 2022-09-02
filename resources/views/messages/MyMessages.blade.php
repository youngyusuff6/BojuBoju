@extends('layouts.app')
@section('title') My Messages @endsection

@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/mymessages.css')}}">
<style>
#body{
  background-image: url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5Ojf/2wBDAQoKCg0MDRoPDxo3JR8lNzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzf/wAARCAAjAEADASIAAhEBAxEB/8QAGwAAAgMBAQEAAAAAAAAAAAAAAAYEBQcCAwH/xAAlEAABAwQCAgEFAAAAAAAAAAABAAIEAwURIRIiMTJCExVBUqH/xAAZAQADAQEBAAAAAAAAAAAAAAACAwQAAQb/xAAcEQACAwADAQAAAAAAAAAAAAAAAQIDEQQTITH/2gAMAwEAAhEDEQA/AIdspjITdbKQwEoW2sMjYTfa6oICbNHpJz2PhfUKIIGl2+KHDwuorwQpgwQkMhlY0yik28OB6qin2wb6p2qMBUCXHaQdLiQ6vkNGZXK34zpLU2JxJ0tMusQYOkm3OOATpVVR0101JaQbdMwRtOVpmDA2swhSeJG00W24cQNrT9E1W6sZqESYOI2prZjceUgx7uGtHZSPvYHy/qUoaFKCY8iW0/lcVK7SDtJtK9A/JSm3YOHsj6wOsm3NzS0pKu7hlyup1xDmnaVLpK5E7VFawVa8Qlx3HI2raK9w8OKEJTFVFgyrUwOxX36tT9ihCyK18PejVfn2KsKdV+PYoQmxCiecmo/iexVDNe4k5KEIiW8//9k=');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size:100% 100%;
}
</style>
@endsection


@section('content')<div>


<div class="col-12 body" id="body">


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
 <div class="accordion col-11 ms-4 mt-1 bg-transparent"  id="accordionPanelsStayOpenExample">
  <div class="accordion-item border-0  bg-transparent">
    <h2 class="accordion-header  border-0 step-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button bg-transparent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
        <div class="card-header text-start">No recent messages</div>
      </div>
@endif
<div class="pagination justify-content-center mt-3">
    {{$messages->links()}}
</div>
</div></div></div></div>
@endsection

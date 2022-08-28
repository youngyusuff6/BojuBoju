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
           <div class="text-center mt-5 mb-5 intro-header">
             <p>
                <h1>Welcome to
                  <br> <b>BojuBoju </b> <br> Anonymous messages</h1>

            </p>
            <p class="headers-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eligendi accusantium aspernatur ipsum, natus tenetur similique dolor ex magnam
            fugiat, ad facere repudiandae voluptatem est alias cupiditate amet iste. Similique, magni.</p>

         <a  href="{{ route('register') }}" class="btn border-0 fs-3 ">GET STARTED</a>
        </div>

        <div class="text-center mb-5 mt-5">
            <h1 class="mt-5 pt-5">Using BojuBoju</h1>

<div class="accordion mt-4 col-11 bg-transparent"  id="accordionPanelsExample">
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header" id="panels-headingOne">
      <button class="accordion-button  step-header text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#panels-collapseOne" aria-expanded="true" aria-controls="panels-collapseOne">
      STEP 1
      </button>
    </h2>
    <div id="panels-collapseOne" class="accordion-collapse collapse " aria-labelledby="panels-headingOne">
      <div class="accordion-body">
      <strong>    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
    </strong>    </div>
    </div>
  </div>
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header" id="panels-headingTwo">
      <button class="accordion-button step-header text-warning " type="button" data-bs-toggle="collapse" data-bs-target="#panels-collapseTwo" aria-expanded="false" aria-controls="panels-collapseTwo">
       STEP 2
      </button>
    </h2>
    <div id="panels-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panels-headingTwo">
      <div class="accordion-body">
        <strong>    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
    </strong>  </div>
    </div>
  </div>
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header" id="panels-headingThree">
      <button class="accordion-button step-header text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#panels-collapseThree" aria-expanded="false" aria-controls="panels-collapseThree">
      STEP 3
      </button>
    </h2>
    <div id="panels-collapseThree" class="accordion-collapse collapse" aria-labelledby="panels-headingThree">
      <div class="accordion-body">
      <strong>    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur nisi amet, dolore consectetur voluptatum, ipsa cumque vel nostrum ad dolor. Repellat quasi amet iste cumque delectus, corrupti ex ratione.
    </strong>  </div>
    </div>
  </div>
</div>
   </div>





   <div class="text-center mt-5">
            <h1 class="mt-5  pt-5">WHAT WE DO</h1>

<div class="card-group about-card">
  <div class="card me-2 mt-5 ms-2  ">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card me-2 mt-5 ms-2 ">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card me-2 mt-5 ms-2">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
  </div>






  <div class="text-center mt-5">
            <h1 class="mt-5  pt-5">About BojuBoju</h1>
  </div>












        </div>
    </div>
</div>

</body>

@endsection

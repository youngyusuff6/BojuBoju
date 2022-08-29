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


        <!-- page header  -->
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




        <!-- what we do  -->
   <div class="text-center margins mb-5 ">
            <h1 class="mt-5 mb-3 pt-5">WHY USE <b>BOJUBOJU</b> ?</h1>
           <p>   <b>BojuBoju</b> comes along with many great features. Here we are going to list some of them. Have a look below.
</p>

<div class="card-group why-card">
  <div class="card me-2 why-cards mt-5 ms-2  ">
      <div class="card-body">
      <h4 class="card-title">Assured Anonymity</h4>
      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
      <p class="card-text">Our Platform ensures your privacy so
         that your identity remains anonymous anytime you send someone a secret message. Your identity is anonymous
        until you ever choose to reveal your identity.</p>

    </div>
  </div>
  <div class="card me-2 why-cards mt-5 ms-2 ">
      <div class="card-body">

      <h4 class="card-title">Verified User Privacy</h4>
      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
</svg>
      <p class="card-text">Safety of our users using this anonymous messaging platform is very important to us.
         We have got reporting systems so  you can report anything that you do not wish to see.</p>

    </div>
  </div>
  <div class="card me-2 why-cards mt-5 ms-2">
      <div class="card-body">

      <h4 class="card-title">Seamless User Experience</h4>
       <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
</svg>
      <p class="card-text">We are constantly working on BojuBoju as a platform so you can experience a friendly user experience. fill in your username and password to get started.
        <a href="#accordionPanelsStayOpenExample">Click here</a>  to view the easy steps  </p>

    </div>
  </div>
</div>
  </div>






        <div class="text-center margins mb-5 ">
            <h1 class="mt-5 pt-5">Using <b>BojuBoju </b></h1>
            <p>You only need these three steps to get started with <b>BojuBoju</b></p>

            <div class="accordion col-11 ms-4 mt-5 bg-transparent"  id="accordionPanelsStayOpenExample">
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        STEP 1
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
      <strong>  Create An Account On The Register Page And If You Have An Account <a href="/login">Click here</a> </strong>    </div>
    </div>
  </div>
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button text-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
       STEP 2
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
        <strong>  Share Your Profile Link Via Any Social Media Platform Of Your Choice
   </strong>  </div>
    </div>
  </div>
  <div class="accordion-item   bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button text-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
     STEP 3
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <strong>   You Are Good To Go  !  </strong>  </div>
    </div>
  </div>
</div>


   </div>










  <div class="text-center margins">
            <h1 class="mt-5  pt-5">About <b>BojuBoju</b> </h1>
  </div>












        </div>
    </div>
</div>

</body>

@endsection

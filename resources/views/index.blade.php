@extends('layouts.app')
@section('title') Home @endsection
{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/index.css')}}">
@endsection
@section('content')

<div class="body">
    <div style="width:100%;  " class=" rounded  ms-auto me-auto">


        <!-- page header  -->
        <div class="text-center header mt-2 mb-5 intro-header">
             <p>
                <h1>Welcome to
                  <br> <b>BojuBoju </b> <br> Anonymous messages</h1>

            </p>
            <p class="headers-paragraph"><b>BojuBoju</b> is an interactive anonymous messaging app
                with an interesting dare game. Create your Profile Link by <a style="text-decoration:none ; color:orange;background-image:none;" href="/register">signing up </a>and sharing the link to all your contacts to check what your friends think about you. With<b> BojuBoju</b>,
                 you can send and receive anonymous messages from anyone for free!</p>

         <a  href="{{ route('register') }}" class="btn border-0 fs-3 ">GET STARTED</a>
        </div>




        <!-- what we do  -->
   <div class="text-center margins mb-5 ">
            <h1 class="mt-5 mb-3 pt-5">WHY USE <b>BOJUBOJU</b> ?</h1>
           <p>   <b>BojuBoju</b> comes along with many great features. Here we are going to list some of them. Have a look below.
</p>

<div class="card-group why-card">
  <div class="card me-2 why-cards mt-5 ms-2  ">
      <div class="card-body why-cards-body">
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

      <div class="card-body why-cards-body">

      <h4 class="card-title">Verified User Safety</h4>
      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
</svg>
      <p class="card-text">Safety of our users using this anonymous messaging platform is very important to us.
         We have reporting systems so  you can report things you do not wish to see.</p>

    </div>
  </div>
  <div class="card me-2 why-cards mt-5 ms-2">

      <div class="card-body why-cards-body">

      <h4 class="card-title">Seamless User Experience</h4>
       <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
</svg>
      <p class="card-text">We are always working on BojuBoju as a platform so you can experience a friendly user experience. fill in your username and password to get started.
        <a class="text-warning" href="#accordionPanelsStayOpenExample">Click here</a>  to view the easy steps  </p>

    </div>
  </div>
</div>
  </div>






        <div class="text-center margins mb-5 ">
            <h1 class="mt-5 pt-5">Using <b>BojuBoju </b></h1>
            <p>You only need these Three steps to get started with <b>BojuBoju</b></p>

            <div class="accordion col-11 ms-auto me-auto mt-5 bg-transparent"  id="accordionPanelsStayOpenExample">
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         STEP 1
      </button>
    </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPanelsStayOpenExample">
    <div class="accordion-body">
      <strong>  Create An Account On The Register Page And If You Have An Account <b><a style="text-decoration:none ; color:orange;" href="/login">  Click here</a></strong></b>    </div>
    </div>
  </div>
  <div class="accordion-item  bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button text-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> STEP 2
      </button>
    </h2>
      <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionPanelsStayOpenExample">
    <div class="accordion-body">
        <strong>  Share Your Profile Link Via Any Social Media Platform Of Your Choice
   </strong>  </div>
    </div>
  </div>
  <div class="accordion-item   bg-transparent">
    <h2 class="accordion-header step-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button text-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        STEP 3
      </button>
    </h2>
      <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionPanelsStayOpenExample">
    <div class="accordion-body">
      <strong>   You Are Good To Go  !  </strong>  </div>
    </div>
  </div>
</div>


   </div>










  <div class="text-center  margins">
            <h1 class="mt-5  pt-5">About <b>BojuBoju</b>
        </h1>

 <div class="card mt-5 bg-transparent about-card border-0" style="max-width: 100%;">
    <div class="row about-container g-0">
        <div class="col about-text-container">
        <div class="card-body about-body">
            <p class="card-text"> BojuBoju is an interactive anonymous messaging Platform <br/> created  December 2022.
                Built with laravel by contributing developers. <br/>
                With BojuBoju, you can send and receive  <br/>anonymous messages from anyone for free!
            </p>
        </div>
        </div>
        <div class="col about-image">
        <img src="vendor/images/Hiddenperson-cuate.svg" class="img-fluid rounded-start" alt="...">
        </div>
    </div>
  </div>
  </div>




        </div>
    </div>
</div>












<section class="contact-sec sec-pad">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="contact-detail">
          <h1 class="section-title">Contact us</h1>

          <ul class="contact-ul">
{{--
            <li>
              <i class="fa fa-phone"></i>
              <a href="tel:+2348089800377"><b>+2348089800377</b></a>
            </li> --}}

            <li>
              <i class="fa-solid fa-envelope"></i>
              <a href="mailto:bojubojuanonymous@gmail.com"><b> bojubojuanonymous@yahoo.com</b></a>
            </li>
          </ul>

          <span>
            <a href="#" class="fb"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="insta"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com/bojubojuanonymous" class="twitter"><i class="fa-brands fa-twitter"></i></a>
          </span>
        </div>
      </div>

      <div class="col-md-6">
      <h1 class="section-title">Get in Touch</h1>
     <form action="{{route('contact-us')}}" class="contFrm" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="name" placeholder="Your Name" value="{{@old('name')}}" class="form-control" required />
              @error('name')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                        </span>
              @enderror
            </div>

            <div class="col-sm-6">
              <input type="email" name="email" placeholder="Email Address" value="{{@old('email')}}" class="form-control" required />
              @error('email')
              <span class="text-danger">
                  <small>{{ $message }}</small>
                  </span>
             @enderror
            </div>

            <div class="col-sm-6">
              <input type="tel" name="phone" placeholder="Phone Number ( Optional )" value="{{@old('phone')}}" class="form-control" />
              @error('phone')
              <span class="text-danger">
                  <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="col-sm-6">
              <input type="text" name="sub" placeholder="Subject" class="form-control" value="{{@old('sub')}}" required  />
              @error('sub')
              <span class="text-danger">
                  <small>{{ $message }}</small>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <textarea class="form-control" rows="" name="message" cols="" placeholder="Your Message..." required>{{@old('message')}}</textarea>
              @error('message')
              <span class="text-danger">
                  <small>{{ $message }}</small>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <input type="submit" name="submit" value="SUBMIT" class="inptBtn" />
            </div>
          </div>
        </form>
      </div>
    </div>



  </div>
</section>



</body>

@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ Config::get('app.meta_keywords') }}" />
    <meta name="author" content="{{ Config::get('app.name') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="0fmJ-LyvPXl-7kr8NK1-vgW-ezwAjhAsW2K2PoYba7Q" />
    <meta name="description" content="{{ Config::get('app.meta_description') }}" />
    <meta property="og:title" content="{{ Config::get('app.meta_title') }}" />
    <meta property="og:description" content="{{ Config::get('app.meta_description') }}" />
    @yield('og-image')

    <title> {{ Config::get('app.name') }} | @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer> </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/css/toastr.min.css')}}" rel="stylesheet">

    <!-- bootstrap icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
      .toast-info {
        background-color: #2f96b4;
      }
      .toast-success {
        background-color: #198754;
      }
      .toast-warning {
        background-color: #ffc107;
      }
      .toast-error {
        background-color: #dc3545;
      }
     </style>
    @yield('styles')


    <!-- web icon -->
    <link rel = "icon" href ="{{ asset('vendor/images/web-icon.ico')}} "  type = "image/x-icon" height="50px" width="80px">

    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/f335250b9c.js" crossorigin="anonymous"></script>
    <!-- Icon -->
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-protection-mask-16.png">
</head>



<body
style="
    background-image: url('vendor/images/backgroundcolor.jpg');
    background-position: center;
    background-attachment:scroll;
    background-size:cover;
    background-repeat:no-repeat;
">

    <div id="app">



    <nav class="navbar mb-5 navbar-expand-lg bg-transparent">

    <div class="container-fluid mt-0">

    <a class="navbar-brand" href="{{ url('/') }}">
                <!-- brand-logo -->
                <img class="brandlogo" alt="Qries"  src="{{ asset('vendor/images/brandlogo.png')}}" height="80" width="120">
                 <!-- {{ config('app.name', 'BojuBoju | Anonymous Messages') }} -->
                </a>
   @guest <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" className="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav  ms-auto">
       <!-- Right Side Of Navbar -->
                   <!-- Authentication Links -->

                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class=" "  href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                            @endif


                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class=""   href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>
                            @endif


      </ul>@else






<div class="btn-group profile-btn-group text-center">
  <button  class="btn profile-btn d-flex " data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
  <h5 class="mt-1"> {{ Auth::user()->username }}</h5>
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12" fill="currentColor" class="bi me-auto pe-auto mt-2 bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
</button>
  <ul class="dropdown-menu dropdown-menu-end border-0 dropdown-menu-lg-start">

  <li>        <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>    </li>
    <li>   <a href="{{route('changeSettings')}}" class="dropdown-item">Profile Settings</a>
                                  </li>
    <li> <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
             </a> </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
             </form>
                </div>
  </ul>
</div>









</div>
  </div>

 @endguest




  </div>
</nav>







        <main class="py-5 container ">
            @yield('content')
        </main>
    </div>
    <footer style="position:relative ;" class=''>
         <hr>


       <div class="docs">

         <li>  <a href="{{route('terms')}}"> Terms and Condition </a></li>
         |<li>  <a href="{{route('disclaimer')}}"> Disclaimer </a></li>
        | <li>  <a href="{{route('privacy')}}"> Privacy and Policy </a></li>
        </div>





        <p class="bojuboju-signature text-center"> &copy; @php echo date('Y')@endphp BojuBoju | Anonymous Messages.  <br> All Rights Reserved.</p>
    </footer>
    @yield('scripts')
    <!-- Toast js Library -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/js/toastr.min.js')}}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        {!! Toastr::message() !!}
</body>
</html>

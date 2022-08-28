<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @yield('styles')


    <!-- web icon -->
    <link rel = "icon" href ="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjtHDYkP6gvC3kafpfS_v68YOz0cp-P3sqZlpFyB1ya7sF-x1t8eORa64x1KcWBaBNne16O5SHgM_LyjG5Vb396Bz3QfO6ElbgpA4fwaVIXytxBIqC5Wp7iQodrqH9pyUVDVpd1bR09VDyt4ronc4luisoapQuf0Fx4TXz7ax8vYb1B59Z3FnEhk0gVsw/s1600/output-onlinepngtools-_4_.ico"  type = "image/x-icon" height="50px" width="80px">

    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/f335250b9c.js" crossorigin="anonymous"></script>
    <!-- Icon -->
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-protection-mask-16.png">
</head>



<body
style="
   background-image: url('vendor/images/backgroundcolor.jpg');
    background-repeat:no-repeat;
    background-position: center;
    background-size:cover;
    background-attachment:fixed;
">

    <div id="app">



    <nav class="navbar navbar-expand-lg bg-transparent">

    <div class="container-fluid mt-0">

    <a class="navbar-brand mt-0 " href="{{ url('/') }}">
                <!-- brand-logo -->
                <img class="brandlogo" alt="Qries"  src="{{ asset('vendor/images/BOJU BOJU (5).png')}}" height="80" width="100">
                     <!-- {{ config('app.name', 'BojuBoju | Anonymous Messages') }} -->
                </a>
   @guest <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" className="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav  ms-auto">
       <!-- Right Side Of Navbar -->
                   <!-- Authentication Links -->

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class=" "  href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class=""   href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

      </ul>@else <div class="btn-group mt-2 drop-profile">
  <button class="btn bg-transparent border-0" type="button">
  <div class="d-block">
     <img alt="Qries"  src="vendor/images/profile.png" height="40">
         <p class=""> {{ Auth::user()->name }} </p>
        </div>
  </button>
  <button type="button" class="btn btn-lg border-0 bg-transparent dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu border-0 shadow-sm">

  <li>        <a href="/messages" class="dropdown-item">Dashboard</a>    </li>
    <li>   <a href="/settings" class="dropdown-item">Profile Settings</a>
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


 @endguest



  </div>
</nav>







        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <footer class='mt-5'>

        <hr><div class="docs">

         <li>  <a href="vendor/documents/Terms and Conditions.pdf"> Terms and Condition </a></li>
         |<li>  <a href="vendor/documents/Disclaimer.pdf"> Disclaimer </a></li>
        | <li>  <a href="vendor/documents/Privacy Policy.pdf"> Privacy and Policy </a></li>
        </div>
        <p class="text-center">© @php echo date('Y')@endphp BojuBoju | Anonymous Messages. <br> All Rights Reserved.</p>
    </footer>
    @yield('scripts')
</body>
</html>

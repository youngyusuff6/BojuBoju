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
    <script>
    window.loading_screen =
    window.pleaseWait({
        logo:"",
        backgroundColor:"red",
});
    window.loading_screen.finish();
</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../../../../css/login.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- web icon -->
    <link rel = "icon" href ="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjtHDYkP6gvC3kafpfS_v68YOz0cp-P3sqZlpFyB1ya7sF-x1t8eORa64x1KcWBaBNne16O5SHgM_LyjG5Vb396Bz3QfO6ElbgpA4fwaVIXytxBIqC5Wp7iQodrqH9pyUVDVpd1bR09VDyt4ronc4luisoapQuf0Fx4TXz7ax8vYb1B59Z3FnEhk0gVsw/s1600/output-onlinepngtools-_4_.ico"  type = "image/x-icon" height="50px" width="80px">

    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/f335250b9c.js" crossorigin="anonymous"></script>
    <!-- Icon -->
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-protection-mask-16.png">
</head>



<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-md" style="height:80px;  box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <!-- brand-logo -->
                <img class="" alt="Qries"  src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgBPM_KpcLHL2Y2MqvCWwUbnRWJ7xjzEx6vvZGDlfJD8GR19Gh7GcwO_S_otoj4NOhGNUymCe9EhcjGP8bndKEpOAG6oh7jwaLbmnx2XqnWV2PF8ogPfJDdNwzW0mSng3KPMOAKBKs5TBlDrvki9lIb-D-U-D51br4xH6BRgxyjTNQcRBIHjvNAwKp-jA/s320/bojuboju.png" height="80" width="100">
                     <!-- {{ config('app.name', 'BojuBoju | Anonymous Messages') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link " style="font-family: 'PT Sans', sans-serif;" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-family: 'PT Sans', sans-serif;"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="d-flex nav-item dropdown" style="left: ;">

                           <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <!-- user  image -->
                                <img alt="Qries"  src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" height="40">
                                {{ Auth::user()->name }}   </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="/messages" class="dropdown-item">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <footer class='mt-5'>
        <hr>
        <p class="text-center">© @php echo date('Y')@endphp BojuBoju | Anonymous Messages. <br> All Rights Reserved.</p>
    </footer>
    @yield('scripts')
</body>
</html>

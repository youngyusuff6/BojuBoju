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
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/app.css')}}" rel="stylesheet">

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


        <main class="container ">
            @yield('content')


        </main>
    </div>




    @yield('scripts')<!-- Toast js Library -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        {!! Toastr::message() !!}
</body>
</html>

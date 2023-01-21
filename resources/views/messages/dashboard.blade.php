@extends('layouts.app')
@section('title') Dashboard @endsection
@section('og-image')
<meta property="og:image" content="{{ asset('vendor/images/indexthumbnail.png')}}" />
@endsection
{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/dashboard.css')}}">
    <style>


/*
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
} */


    </style>
@endsection
@section('content')


<div style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;"
     class="card bg-transparent body border-0">
    <div class="card-header d-flex bg-transparent justify-content-between ">
      <div>
         <h1 class="lead   bg-transparent">Good {{$timeOfTheDay}} <span class="username ">{{$username}},</span></h1>
      </div>

     <!-- Trigger -->
<button class="btn" data-clipboard-text=" there">
    Copy to clipboard
</button>
 <!-- <button onclick="copy();" class="btn btn-info profile-link-button flex-end"  data-toggle="tooltip" data-placement="top" title="Copy to clipboard">Profile Link <i class="bi bi-link-45deg"></i></button> -->


</div>
    <div class="card-body  bg-transparent border-0">
        <p>You're logged in!</p>

        <div class="messages text-center">
        <a href="{{route('myMessages')}}" class="btn rounded-pill fs-5 message  mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi  me-2 ms-3 bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg>Messages
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi ms-2 me-3 bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg>
        </a>

       </div>



        <div class="container share-links text-center rounded mt-5 border-0 bg-transparent">
        <a target="_blank" href="https://api.whatsapp.com/send?text=Hello, I am {{$username}}, Send me an anonynous message on <?php echo route('/').'/'.$username; ?>" class="btn rounded-pill whatsapp-share fs-5  mt-3">

        Share To Whatsapp
        <i class="bi bi-whatsapp"></i></a>

<a href="https://www.facebook.com/share.php?u=<?php echo route('/').'/'.$username; ?>" target="_blank" class="btn facebook-share rounded-pill fs-5   mt-3">
        Share To Facebook
        <i class="bi bi-facebook"></i>
       </a>



        <a target="_blank" class="btn rounded-pill border-0 fs-5 twitter-share  mt-3" href="https://twitter.com/share?text=Hi, send me an anonymous message here!&url=<?php echo route('/').'/'.$username; ?>&hashtags=BojuBoju,Anonymous">
    Share to Twitter
    <i class="bi bi-twitter"></i>
    </a>


       <a class="btn rounded-pill border-0 fs-5 account-settings  mt-3" href="{{route('changeSettings')}}">
       Account Settings
       <i class="bi bi-gear-fill"></i></a>

       <div>


    </div>
</div>



           <div class="logout mt-5 text-right">
              <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn btn-danger mt-5">
                    Logout
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>

            {{-- MODALLLLL --}}



            {{-- MODALLLLL --}}


    </div>


@endsection
@section('scripts')
<script src="dist/clipboard.min.js"></script>

<script>
function copy() {
  let url = '<?php echo route('/').'/'.$username; ?>'
    navigator.clipboard.writeText(url).then(function() {
        alert('Copied!');
    }, function() {
        alert('Copy error')
    });

}


var clipboard = new ClipboardJS('.btn');
clipboard.destroy();
</script>
@endsection

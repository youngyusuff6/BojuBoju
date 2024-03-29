<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ Config::get('app.name') }} | Admin </title>

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
    <link href="{{ asset('vendor/css/admin.css')}}" rel="stylesheet">

    <!-- bootstrap icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- web icon -->
    <link rel = "icon" href ="{{ asset('vendor/images/web-icon.ico')}} "  type = "image/x-icon" height="50px" width="80px">

    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/f335250b9c.js" crossorigin="anonymous"></script>
    <!-- Icon -->
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-protection-mask-16.png">



</head>

<body>

<input type="checkbox" name="display" id="display">

<section class="cover">
   <label for="display">

</label>
</section>




<div class="sub-body">


 <p class=" headers mt-5 text-center">BojuBoju Admin</p>

<div class="row container  dash-cards ms-auto  me-auto">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4 bg-info">
            <div class="card-header">Total number of users</div>
            <div class="card-body lead display-1 h-100"> {{$user_count}}</div>
          </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4 bg-primary">
            <div class="card-header">Total number of available messages</div>
            <div class="card-body lead display-1 h-100">{{$message_count}}</div>
          </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4 bg-warning">
            <div class="card-header">Total number of messages</div>
            <div class="card-body lead display-1 h-100">{{$total_message_count}}</div>
          </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4 bg-dark">
            <div class="card-header">Total number of available images</div>
            <div class="card-body lead display-1 h-100"> {{$images_count}}</div>
          </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4 bg-success">
            <div class="card-header">Total number of images sent</div>
            <div class="card-body lead display-1 h-100">{{$total_images_count}}</div>
          </div>
    </div>
</div>






<div class="container row ms-auto me-auto mt-5 mb-5">
    <p class="text-center  headers mt-5">Contact Us Messages</p>

 <table class="contact-table  ms-auto me-auto mt-5 rounded border-2">
    <tr>
         <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Phone</th>
        <th> Message   </th>
        <th>Actions</th>
 </tr>

@if (count($contact_us) > 0)

@foreach($contact_us as $contact)

 <tr>
         <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->subject}}</td>
        @if ($contact->phone)
        <td>{{$contact->phone}}</td>
        @endif
        <td>
        {{$contact->message}}
    </td>
    <td>

<!-- Button trigger modal -->
<button type="button" class="btn btn-small btn-warning" data-bs-toggle="modal" data-bs-target="#collapseOne">
  View
</button>

</td>

 </tr>

@endforeach
</table>
<div class="pagination justify-content-center bg-transparent mt-3">
    {{$contact_us->links()}}
</div>


@endif




<!-- modals  -->


<!-- Modal -->
<div class="modal fade" id="collapseOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="info-modal modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body  ms-auto me-auto mt-5 rounded border-2">


       <div class="card-header fs-5 text-start">Name: {{$contact->name}}</div>
        <div class="card-header fs-5 text-start">Email: {{$contact->email}}</div>
        <div class="card-header fs-5 text-start">Subject: {{$contact->subject}}</div>
        @if ($contact->phone)
        <div class="card-header fs-5 text-start">Phone: {{$contact->phone}}</div>
        @endif
        <div class="card-body">
        <p class="card-text">
        Message : {{$contact->message}}
        </p>
    </div>

</div>

<div class="pagination justify-content-center bg-transparent mt-3">
    {{$contact_us->links()}}
</div>


      </div>

    </div>
  </div>
</div>






</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

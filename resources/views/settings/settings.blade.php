@extends('layouts.app')
@section('title') Settings @endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/settings.css')}}">
@endsection
@section('content')
<div
style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;">


 <div class="container text-left ">
            <a href="/messages" class="btn border-0 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi back-icon bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
        </div>
    <div class="container bg-transparent buttons mt-3 bg-success border-0  ms-auto me-auto">
    <div class="container  text-center  ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Username</a>
        </div>
        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Email</a>
        </div>

        <div class="container text-center mt-3 ms-auto me-auto">
            <a href="/changePassword" class="btn rounded-pill border-0">Change Password</a>
        </div>



    </div> <div class="container text-center mt-3 ms-auto me-auto">
          <a type="button" class=" text-center ms-auto me-auto btn btn-danger btn-md preview-button" data-bs-toggle="modal" data-bs-target="#exampleModal1" >

          Delete Account
</a>
        </div>
</div>
















         <!-- 1st Modal -->
         <div class="modal   fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered   bg-transparent modal-sm">
    <div class="modal-content   confirm-delete ">
     <div class="modal-body text-end bg-transparent">

     <button type="button" class="btn-close-white  btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
  <div class="text-start">

  <div class="modal-header  border-0 bg-transparent">
        Are you sure you want to Delete your Account
        </div>
  </div>
  <div class="text-center">
 <a href="#" class="btn btn-danger">Delete Account</a>
  </div>
</div>
  </div>
</div>


@endsection

@extends('layouts.app')
@section('title') Write a Message @endsection
@section('styles')
<link rel="stylesheet" href="{{url('vendor/css/create.css')}}">

@endsection
@section('scripts')

<script>
 var txtBoxRef = document.querySelector("#txtBox");
 var counterRef = document.querySelector("#counterBox");
 txtBoxRef.addEventListener("keydown",function(){
  var remLength = 0;
  remLength = 300 - parseInt(txtBoxRef.value.length);
  if(remLength < 0)
   {
    txtBoxRef.value = txtBoxRef.value.substring(0, 300);
    return false;
   }
  counterRef.value = remLength + " characters remaining...";
 },true);
</script>
@endsection

{{-- ADD CSS CODE HERE | OR LINK CSS HERE --}}
@section('styles')
    <link rel="stylesheet" href="{{url('vendor/css/create.css')}}">
@endsection
@section('content')
<body
style=" background-image: url('vendor/images/background-eye.gif');
    background-repeat:no-repeat;
    background-position: center;
    background-attachment:fixed;
">

 <div style="background-color: rgba(0,0,0, 0.8); border-radius:1%;" class="pt-5 pb-5 send-message">

    <p>
        @if (Session::has('message'))
            <div class="alert alert-success">
                <h2>{{Session::get('message')}}</h2>
            </div>
        @endif
    </p>
    <div class="container  border-0 rounded ms-auto me-auto">
        <div class="text-center message-header fw-2 mx-3"
          style="color:aliceblue ;"><h3 class="lead display-5">Send A Secret Message..</h3></div>
        <div>
            <form action='/messages' method="post" enctype="multipart/form-data">
                @csrf

                <input
                type="hidden"
                name="username"
                value="{{$username['username']}}">


                <div class="form-floating form-group mb-2">
                <textarea
                style="background-color:transparent; color:aliceblue;min-height:100px;"
                     name='message'
                    class="form-control  message-box border-0"
                    placeholder="Send your message here"
                    rows="10"
                    name="my-name"  id="txtBox"
                    maxlength="300" minlength="8">{{@old('message')}}</textarea>

                <input class="word-count border-0" readonly
                type="text" id="counterBox"/>


                <label style="color:silver;" for="my-input">Send a message to $username here</label>
                   @error('message')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                        </span>
                        @enderror
</div>



                <div class="form-group ">

                <div class="accordion bg-transparent accordion-flush" id="accordionFlushExample">
  <div class="accordion-item bg-transparent col-2">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button text-warning bg-transparent col-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Add Image
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse bg-transparent collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <input type="file" placeholder="Add Image" name="image">


    </div>
  </div>
</div>





                @error('image')
                    <p class="text-danger">
                        <small>{{ $message }}</small>
                    </p>
                    @enderror
                </div>

                <div>
                    <input type="submit" class="btn btn-success mt-4" value="Send Message">
                </div>
            </form>
        </div>


    </div>
 </div>

</body>

@endsection

@extends('layouts.password_reset')
@section('content')
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card mt-4">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">OTP Login</h5>
                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
                </lord-icon>

            </div>

            <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                Enter your OTP number, We send OTP number to your email
            </div>
            <div class="p-2">
                <form action="{{ route('login.otp_store') }}" method="POST">
                   @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">OTP</label>
                        <input type="hidden" name="email" value="{{ Session::get('email') }}">
                        <input type="text" name="otp_number" class="form-control @error('otp_number') is-invalid @enderror" id="otp_number" placeholder="Enter Your OTP Number">
                        @error('otp_number')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-success w-100" type="submit">Submit</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div>
        <!-- end card body -->
        <div class="card-footer">
            <div class="mt-4 text-center">
                @if (now()->isAfter(Session::get('regenerate_time')))
                <p class="mb-0" id="resend">Not recieve email OTP ? resend email  <p class="mb-0 d-none" id="countdown"></p><a href="#" onclick="event.preventDefault();regenerate();" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                @else
                <p class="mb-0">Not recieve email OTP ? resend email <p class="mb-0" id="countdown"></p> <a href="#" onclick="event.preventDefault();regenerate();" class="fw-semibold text-primary text-decoration-underline d-none" id="resend"> Click here </a></p>
                @endif
            </div>
        </div>
    </div>
    <!-- end card -->

    <form action="{{ route('login.otp_regenerate') }}" id="form-regenerate" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ Session::get('email') }}">
        <input type="hidden" name="otp_number" value="{{ Session::get('otp_number') }}">
    </form>

</div>
@endsection
@push('js')
<script>
var regenerate_time = "{{ session('regenerate_time') }}";
// Set the date we're counting down to
var countDownDate = new Date(regenerate_time).getTime();
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance <= 0) {
    clearInterval(x);
    $('#countdown').addClass('d-none');
    $('#resend').removeClass('d-none');
    //document.getElementById("resend").innerHTML = "EXPIRED";
  }
}, 1000);

function regenerate()
{
    $('#form-regenerate').submit();
}
</script>
@endpush

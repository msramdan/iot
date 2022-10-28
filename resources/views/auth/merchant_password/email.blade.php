@extends('layouts.password_reset')
@section('content')
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card mt-4">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">Forgot Password?</h5>
                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
                </lord-icon>

            </div>

            <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                Enter your email and instructions will be sent to you!
            </div>
            <div class="p-2">
                <form action="{{ route('merchants.forgot_password_store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                        @error('email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-success w-100" type="submit">Send Reset Link</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->

    <div class="mt-4 text-center">
        <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
    </div>

</div>
@endsection

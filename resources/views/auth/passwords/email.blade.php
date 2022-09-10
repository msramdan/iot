@extends('layouts.auth')
@section('title', 'Halaman Login')
@section('content')
<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <h5 class="text-primary">Forgot Password?</h5>
        <p class="text-muted">{{ __('Reset Password') }}</p>

        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
            </lord-icon>
        </div>
        @if (session('status'))
        <div class="alert alert-borderless alert-success text-center mb-2 mx-2" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="p-2">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">{{ __('Email Address') }}</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                       <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-success w-100" type="submit"> {{ __('Send Password Reset Link') }}</button>
                </div>
            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
        </div>
    </div>
</div>
@endsection

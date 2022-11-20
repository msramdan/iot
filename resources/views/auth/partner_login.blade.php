@extends('layouts.auth')
@section('title', 'Halaman Login')
@section('content')
<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div>
            <h5 class="text-primary">Welcome Back !</h5>
            <p class="text-muted">Sign in to Merchant</p>
        </div>

        <div class="mt-4">
            <form class="user" method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email : hello@indopay.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" onclick="myFunction()">
                    <label class="form-check-label" for="auth-remember-check">Show Password</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">Sign In</button>
                </div>

            </form>
        </div>
        <div class="mt-5 text-center">
            {{-- <p class="mb-0">Doesn't have account? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Register</a> </p> --}}
            <p class="mb-0">Forgot your password ? <a href="{{ route('instances.forgot_password') }}" class="fw-semibold text-primary text-decoration-underline"> Recover Here</a> </p>
        </div>
    </div>
</div>
@endsection

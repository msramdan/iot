@extends('layouts.auth')
@section('title', 'Halaman Login')
@section('content')
<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <h5 class="text-primary">Create new password</h5>
        <p class="text-muted">{{ __('Reset Password') }}</p>

        <div class="p-2">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <label class="form-label" for="password-input">{{ __('Email Address') }}</label>
                    <div class="position-relative auth-pass-inputgroup">
                        <input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password-input">{{ __('Password') }}</label>
                    <div class="position-relative auth-pass-inputgroup">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="confirm-password-input">{{ __('Confirm Password') }}</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="mt-4">
                    <button class="btn btn-success w-100" type="submit">{{ __('Reset Password') }}</button>
                </div>

            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
        </div>
    </div>
</div>
@endsection

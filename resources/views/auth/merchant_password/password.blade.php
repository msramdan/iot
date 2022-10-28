@extends('layouts.password_reset')
@section('content')
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card mt-4">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">Create new password</h5>
                <p class="text-muted">Your new password must be different from previous used password.</p>
            </div>

            <div class="p-2">
                <form action="{{ route('merchants.reset_passsword_store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label class="form-label" for="password-input">Password</label>
                        <div class="position-relative auth-pass-inputgroup">
                            <input type="password" name="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required >
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                        <div id="passwordInput" class="form-text">Must be at least 8 characters.</div>
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="confirm-password-input">Confirm Password</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                            <input type="password" name="password_confirmation" class="form-control pe-5 password-input @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm-password-input" required>
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                        @error('password_confirmation')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                        <h5 class="fs-13">Password must contain:</h5>
                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                        <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                        <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                        <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success w-100" type="submit">Reset Password</button>
                    </div>

                </form>
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

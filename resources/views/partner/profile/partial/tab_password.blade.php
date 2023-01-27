 <form action="{{ route('instances.change_password') }}" method="POST">
    @csrf
    <div class="row g-2">
        <div class="col-lg-4">
            <div>
                <label for="oldpasswordInput" class="form-label">Old Password*</label>
                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="oldpasswordInput" placeholder="Enter current password">
                @error('old_password')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="newpasswordInput" class="form-label">New Password*</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="newpasswordInput" placeholder="Enter new password">
                @error('password')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="confirmpasswordInput" placeholder="Confirm password">
                @error('password_confirmation')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <a href="{{ route('instances.forgot_password') }}" class="link-primary text-decoration-underline">Forgot Password ?</a>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="text-end">
                <button type="submit" class="btn btn-success">Change Password</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>

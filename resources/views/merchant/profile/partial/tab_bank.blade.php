 <form action="{{ route('merchants.update_bank') }}" method="post">
    @csrf
    <div class="row">
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Bank</label>
                <select class="form-control @error('bank_id') is-invalid @enderror" name="bank_id">
                    <option value="">Select Bank</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}" {{ $merchant->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                    @endforeach
                </select>
                @error('bank_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
            <div class="col-lg-4">
            <div class="mb-3">
                <label for="account_name" class="form-label">Account Name</label>
                <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" id="account_name" placeholder="Enter your Account name" value="{{ Auth::guard('merchant')->user()->account_name }}">
                @error('account_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="number_account" class="form-label">Number Account</label>
                <input type="text" name="number_account" class="form-control @error('number_account') is-invalid @enderror" id="emailInput" placeholder="Enter your email" value="{{ Auth::guard('merchant')->user()->number_account }}">
                @error('number_account')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" class="btn btn-primary">Updates</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>

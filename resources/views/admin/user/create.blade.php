@extends('layouts.master')
@section('title', 'Create User')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        type="text" required value="{{ old('name') }}" placeholder="Name"
                                        name="name" autocomplete="off">
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        type="email" value="{{ old('email') }}" placeholder="Email" name="email"
                                        autocomplete="off" required>
                                    @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" required
                                            placeholder="{{ __('Password') }}"> &nbsp;
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="generatePassword()">Generate</button> &nbsp;
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="toggleShowPassword()"><i class="mdi mdi-eye"></i></button>
                                    </div>
                                    <p style="color:gray; font-size:10px">Password should contain at least 8 characters, 1
                                        uppercase, 1
                                        lowercase, 1 number, and 1 symbol</p>
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        required value="{{ old('password_confirmation') }}"
                                        placeholder="Password Confirmation" id="password_confirmation"
                                        name="password_confirmation">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role">Role</label>
                                    <select name="role" required
                                        class="form-control select2-lib @error('role') is-invalid @enderror" id="role">
                                        <option value="" disabled="" selected="">-- Pilih --</option>
                                        @foreach ($role as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('role') && old('role') == $row->id ? 'selected' : '' }}>
                                                {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="photo">Photo</label>
                                    <input class="form-control @error('photo') is-invalid @enderror"
                                        id="
                                    photo" type="file"
                                        value="{{ old('photo') }}" placeholder="Nama Kategori Produk" name="photo"
                                        autocomplete="off">
                                    <p style="color:gray; font-size:10px">File Type : jpg,png,jpeg || Max File : 1048 Kb
                                    </p>
                                    @error('photo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('user.index') }}" class="btn btn-warning"><i
                                            class="mdi mdi-arrow-left-thin"></i> Back</a>
                                    <button type="submit" class="btn  btn-primary"><i class="mdi mdi-content-save"></i>
                                        SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script>
        function toggleShowPassword() {
            const type = $('input#password').attr('type');
            if (type === "password") {
                $('input#password').attr('type', 'text');
                $('input#password_confirmation').attr('type', 'text');
            } else {
                $('input#password').attr('type', 'password');
                $('input#password_confirmation').attr('type', 'password');
            }
        }

        function generatePassword() {
            let password = "";
            let passwordLength = 1;

            const lowerCase = 'abcdefghijklmnopqrstuvwxyz'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * lowerCase.length);
                password += lowerCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const number = '0123456789'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * number.length);
                password += number.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * upperCase.length);
                password += upperCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const character = '!@#$%^&*()'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * character.length);
                password += character.substring(randomNumber, randomNumber + 1);
            }

            const allChars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            passwordLength = 4;
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * allChars.length);
                password += allChars.substring(randomNumber, randomNumber + 1);
            }

            const shuffled = password.split('').sort(function() {
                return 0.5 - Math.random()
            }).join('');
            $('input#password').val(shuffled);
            $('input#password').attr('type', 'text')

            $('input#password_confirmation').val(shuffled);
            $('input#password_confirmation').attr('type', 'text')
        }
    </script>
@endpush

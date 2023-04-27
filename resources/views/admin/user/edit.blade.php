@extends('layouts.master')
@section('title', 'Edit User')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        type="text" value="{{ old('name') ? old('name') : $user->name }}"
                                        placeholder="Nama" name="name" autocomplete="off">
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        type="email" value="{{ old('email') ? old('email') : $user->email }}"
                                        placeholder="Email" name="email" autocomplete="off">
                                    @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Password') }}" {{ empty($user) ? 'required' : '' }}> &nbsp;
                                        <button class="btn btn-outline-primary" type="button"
                                            onclick="generatePassword()">Generate</button> &nbsp;
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="toggleShowPassword()"><i class="mdi mdi-eye"></i></button>
                                    </div>
                                    <p style="color:red; font-size:10px">Password should contain at least 8 characters, 1
                                        uppercase, 1
                                        lowercase, 1 number, and 1 symbol</p>
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    @isset($user)
                                        <div id="passwordHelpBlock" class="form-text">
                                            {{ __('Leave the password & password confirmation blank if you don`t want to change them.') }}
                                        </div>
                                    @endisset
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        id="password_confirmation" type="password"
                                        value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password"
                                        name="password_confirmation">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role">Role</label>
                                    <select name="role"
                                        class="form-control select2-lib  @error('role') is-invalid @enderror"
                                        id="role">
                                        <option value="" disabled="" selected="">-- Pilih --</option>
                                        @foreach ($role as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('role') && old('role') == $row->id ? 'selected' : '' }}
                                                {{ $user->roles->first()->id == $row->id ? 'selected' : '' }}>
                                                {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('user.index') }}" class="btn btn-warning"><i
                                            class="mdi mdi-arrow-left-thin"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                        UPDATE</button>
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

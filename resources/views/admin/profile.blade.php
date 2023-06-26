@extends('layouts.master')

@section('title', __('Profile'))
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Profile') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Profile --}}
            <div class="row">
                <div class="col-md-3">
                    <h4>{{ __('Profile') }}</h4>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.change_profile') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group  mb-3">
                                    <label for="email">{{ __('E-mail Address') }}</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="{{ __('E-mail Address') }}"
                                        value="{{ old('email') ?? auth()->user()->email }}" required>

                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group  mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control  @error('name') is-invalid @enderror" id="name"
                                        placeholder="{{ __('Name') }}"
                                        value="{{ old('name') ?? auth()->user()->name }}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="avatar avatar-xl mb-3">
                                            @if (auth()->user()->photo == null)
                                                <img style="width: 120px" src="{{ asset('frontend/default.png') }}"
                                                    alt="">
                                            @else
                                                <img style="width: 120px"
                                                    src="{{ asset('storage/photo/' . auth()->user()->photo) }}"
                                                    alt="Photo">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="avatar">{{ __('Photo') }}</label>
                                            <input type="file" name="photo"
                                                class="form-control @error('photo') is-invalid @enderror" id="photo">
                                            <p style="color:gray; font-size:10px">File Type : jpg,png,jpeg || Max File :
                                                1048 Kb
                                            </p>
                                            @error('photo')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Password --}}
            <div class="row">
                <div class="col-md-3">
                    <h4>{{ __('Change Password') }}</h4>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('dashboard.change_password') }}">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="password">{{ __('Current Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            placeholder="Current Password" required>
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="toggleShowPasswordCurrent()"><i class="mdi mdi-eye"></i></button>
                                    </div>


                                    @error('current_password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="New Password" required>
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="toggleShowPassword()"><i class="mdi mdi-eye"></i></button>
                                    </div>
                                    <p style="color:gray; font-size:10px">Password should contain at least 8 characters,
                                        1 uppercase, 1 lowercase, 1 number, and 1 symbol</p>
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirm Password" required>
                                    @error('password_confirmation')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
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
    </script>

    <script>
        function toggleShowPasswordCurrent() {
            const type = $('input#current_password').attr('type');
            if (type === "password") {
                $('input#current_password').attr('type', 'text');
            } else {
                $('input#current_password').attr('type', 'password');
            }
        }
    </script>
@endpush

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
                                <label for="exampleFormControlInput1">Nama</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="
                                                            exampleFormControlInput1" type="text"
                                    value="{{ old('name') ? old('name') : $user->name }}" placeholder="Nama"
                                    name="name" autocomplete="off">
                                @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="
                                                            exampleFormControlInput1" type="email"
                                    value="{{ old('email') ? old('email') : $user->email }}" placeholder="Email"
                                    name="email" autocomplete="off">
                                @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="
                                                            exampleFormControlInput1" type="password"
                                    value="{{ old('password') }}" placeholder="Password" name="password">
                                    <span style="color: red">*leave it blank if you don't want to change the password</span>
                                @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Konfirmasi Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="
                                                            exampleFormControlInput1" type="password"
                                    value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password"
                                    name="password_confirmation">
                                @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Role</label>
                                <select name="role" class="form-control select2-lib  @error('role') is-invalid @enderror"
                                    id="exampleFormControlSelect1">
                                    <option value="" disabled="" selected="">-- Pilih --</option>
                                    @foreach ($role as $row)
                                        <option value="{{ $row->id }}"
                                            {{ old('role') && old('role') == $row->id ? 'selected' : '' }}
                                            {{ $user->roles->first()->id == $row->id ? 'selected' : '' }}
                                            >
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
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

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
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="
                                                                exampleFormControlInput1" type="text" value="{{ old('name') }}" placeholder="Name" name="name" autocomplete="off">
                                @error('name')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="
                                                                exampleFormControlInput1" type="email" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off">
                                @error('email')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="
                                                                exampleFormControlInput1" type="password" value="{{ old('password') }}" placeholder="Password" name="password">
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Password Confirmation</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="
                                                                exampleFormControlInput1" type="password" value="{{ old('password_confirmation') }}" placeholder="Password Confirmation" name="password_confirmation">
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Role</label>
                                <select name="role" class="form-control select2-lib @error('role') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option value="" disabled="" selected="">-- Pilih --</option>
                                    @foreach ($role as $row)
                                    <option value="{{ $row->id }}" {{ old('role') && old('role') == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <a href="{{ route('user.index') }}" class="btn btn-warning"><i
                                    class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn  btn-primary"><i class="mdi mdi-content-save"></i> SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

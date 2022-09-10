@extends('layouts.master')
@section('title', 'Edit Role')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Role</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Edit Role</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group ">
                            <a href="{{ route('roles.index') }}" class="btn btn-warning" style="float: right"><i
                                    class="mdi mdi-arrow-left-thin"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1">Nama Role</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="exampleFormControlInput1" placeholder=""
                                    value="{{ old('name') ? old('name') : $role->name }}" autocomplete="off">
                                @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control overflow-auto h-100  @error('permissions') is-invalid @enderror">
                                <div class="row">
                                    @foreach (config('permission.authorities') as $manageName => $permission)
                                        <div class="col-md-3 mb-4">
                                            <div class="card ">
                                                <div class="card-header bg-dark" style="color: white">
                                                    {{ ucwords($manageName) }}
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($permission as $list)
                                                        <div class="form-check mb-1">
                                                            @if (old('permissions', $permissionChecked))
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="{{ Str::slug($list) }}" name="permissions[]"
                                                                    value="{{ $list }}"
                                                                    {{ in_array($list, old('permissions', $permissionChecked)) ? 'checked' : null }}
                                                                    {{ $role->id == 1 ? 'disabled' : '' }} />
                                                            @else
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="{{ Str::slug($list) }}" name="permissions[]"
                                                                    value="{{ $list }}"
                                                                    {{ $role->id == 1 ? 'disabled' : '' }} />
                                                            @endif

                                                            <label class="form-check-label"
                                                                for="{{ Str::slug($list) }}">{{ $list }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('permissions')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <button type="submit" {{ $role->id == 1 ? 'disabled' : '' }} class="btn btn-primary" style="float: right"><i
                                        class="fas fa-save"></i> UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

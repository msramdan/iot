@extends('layouts.master')
@section('title', 'Create Ticket')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Ticket</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('subinstance.cluster.index', $subinstance->id) }}">Ticket</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('subinstance.cluster.store', $subinstance->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="subject">Judul</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                    class="form-control @error('subject') is-invalid @enderror ">
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image_1">Image 1</label>
                                <input type="file" name="image_1" id="image_1"
                                    class="form-control @error('image_1') is-invalid @enderror">
                                @error('image_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image_2">Image 2</label>
                                <input type="file" name="image_2" id="image_2"
                                    class="form-control @error('image_2') is-invalid @enderror">
                                @error('image_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_ticket">Status</label>
                                <select name="status" id="status_ticket"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="" selected disabled>==PILIH==</option>
                                    <option value="open" {{ old('status')=='open' ? 'selected' : '' }}>Open</option>
                                    <option value="acknowlodge" {{ old('status')=='acknowledge' ? 'selected' : '' }}>
                                        Acknowlodge</option>
                                    <option value="closed" {{ old('status')=='closed' ? 'selected' : '' }}>Closed
                                    </option>
                                    <option value="cancelled" {{ old('status')=='cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                    <option value="need confirmation" {{ old('status')=='need confirmation' ? 'selected'
                                        : '' }}>Need Confirmation</option>
                                    <option value="alert" {{ old('status')=='alert' ? 'selected' : '' }}>Alert</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('subinstance.cluster.index', $subinstance->id) }}" class="btn btn-warning"><i
                                        class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                    SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
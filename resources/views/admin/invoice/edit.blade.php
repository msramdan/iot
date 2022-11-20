@extends('layouts.master')
@section('title', 'Edit Invoice')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoice</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('invoice.update', $invoice->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-bold">Invoice Number</h4>
                            <h6>{{ $invoice->invoice_number }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">Period</label>
                                <input type="datetime-local" name="period" id="period" value="{{ old('period') ?? $invoice->period }}" class="form-control @error('period') is-invalid @enderror">
                                @error('period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $invoice->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Grand Total</label>
                                <input type="number" class="form-control c" step="0.01" name="grand_total" id="grand_total" value="{{ old('grand_total') ?? $invoice->grand_total}}">
                                @error('grand_total')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" selected disabled>==Pilih==</option>
                                    <option value="aktif" {{ (old('status') ?? $invoice->status) == 'aktif' ? 'selected' : '' }} >Aktif</option>
                                    <option value="nonaktif" {{ (old('status') ?? $invoice->status) == 'nonaktif' ? 'selected' : '' }} >Nonaktif</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('invoice.index') }}" class="btn btn-warning"><i
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
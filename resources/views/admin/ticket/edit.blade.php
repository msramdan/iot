@extends('layouts.master')
@section('title', 'Edit Ticket')

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
                                <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Ticket</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form action="{{ route('tickets.update', $ticket->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="subject">Judul</label>
                                    <input type="text" name="subject" id="subject"
                                        value="{{ old('subject') ?? $ticket->subject }}"
                                        class="form-control @error('subject') is-invalid @enderror ">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $ticket->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status_ticket">Status</label>
                                    <select name="status" id="status_ticket"
                                        class="form-select @error('status') is-invalid @enderror">
                                        <option value="" selected disabled>==PILIH==</option>
                                        <option value="open"
                                            {{ (old('status') ?? $ticket->status) == 'open' ? 'selected' : '' }}>Open
                                        </option>
                                        <option value="acknowledge"
                                            {{ (old('status') ?? $ticket->status) == 'acknowledge' ? 'selected' : '' }}>
                                            Acknowlodge</option>
                                        <option value="closed"
                                            {{ (old('status') ?? $ticket->status) == 'closed' ? 'selected' : '' }}>Closed
                                        </option>
                                        <option value="cancelled"
                                            {{ (old('status') ?? $ticket->status) == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                        <option value="need confirmation"
                                            {{ (old('status') ?? $ticket->status) == 'need confirmation' ? 'selected' : '' }}>
                                            Need Confirmation</option>
                                        <option value="alert"
                                            {{ (old('status') ?? $ticket->status) == 'alert' ? 'selected' : '' }}>Alert
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('tickets.index') }}" class="btn btn-warning"><i
                                            class="mdi mdi-arrow-left-thin"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                        SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Preview Evidence Ticket 1</label>
                                            <img src="{{ asset('storage/' . $ticket->image_1) }}" alt=""
                                                class="img-fluid" id="output1">
                                        </div>
                                        <div class="col-6">
                                            <label for="">Preview Evidence Ticket 2 (Optional)</label>
                                            <img src="{{ asset('storage/' . $ticket->image_2) }}" alt=""
                                                class="img-fluid" id="output2">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="image_1">Evidence Ticket 1</label>
                                    <input type="file" name="image_1" id="image_1" onchange="loadfile('output1')"
                                        class="form-control @error('image_1') is-invalid @enderror">
                                    @error('image_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image_2">Evidence Ticket 2 (Optional)</label>
                                    <input type="file" name="image_2" id="image_2" onchange="loadfile('output2')"
                                        class="form-control @error('image_2') is-invalid @enderror">
                                    @error('image_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('js')
    <script>
        var loadfile = function(selector) {
            var output = document.getElementById(selector);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush

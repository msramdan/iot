@extends('layouts.master_partner')
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
        <form action="{{ route('instances.tickets.update', $ticket->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="subject">Judul</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') ?? $ticket->subject }}"
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
                                    class="form-select @error('status') is-invalid @enderror" disabled>
                                    <option value="{{ $ticket->status }}" selected>{{ $ticket->status }}</option>
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
            </div>
        </form>

    </div>
</div>

@endsection
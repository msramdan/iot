@extends('layouts.master')
@section('title', 'Setting App')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Setting Apps</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Setting Apps</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('settingApp.update', $setting_app->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="app_name">App Name </label>
                                            <input class="form-control @error('app_name') is-invalid @enderror"
                                                id="app_name" type="text"
                                                value="{{ old('app_name') ? old('app_name') : $setting_app->app_name }}"
                                                placeholder="" name="app_name" autocomplete="off">
                                            @error('app_name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if ($setting_app->logo != '' || $setting_app->logo != null)
                                                <img src="{{ Storage::url('public/img/setting_app/') . $setting_app->logo }}"
                                                    class="img-preview d-block mb-3 col-sm-5 " style="width:200px">
                                            @endif
                                            <label class="form-label" for="logo">App Logo </label>
                                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                                id="logo" name="logo" onchange="previewImg()"
                                                value="{{ $setting_app->logo }}">
                                            <span style="color:red; font-size:10px">Dimensions suggestion : 200x60 pixels |
                                                Max size : 2048 Kb </span>
                                            @error('logo')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if ($setting_app->favicon != '' || $setting_app->favicon != null)
                                                <img src="{{ Storage::url('public/img/setting_app/') . $setting_app->favicon }}"
                                                    class="img-preview d-block mb-3 col-sm-5 " style="width: 50px">
                                            @endif
                                            <label class="form-label" for="favicon">Favicon </label>
                                            <input type="file"
                                                class="form-control @error('favicon') is-invalid @enderror" id="favicon"
                                                name="favicon" onchange="previewImg()" value="{{ $setting_app->favicon }}">
                                            <span style="color:red; font-size:10px">Dimensions suggestion : 512x512 pixels |
                                                Max size : 2048 Kb </span>
                                            @error('favicon')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Phone</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                type="text"
                                                value="{{ old('phone') ? old('phone') : $setting_app->phone }}"
                                                placeholder="" name="phone" autocomplete="off">
                                            @error('phone')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                                type="email"
                                                value="{{ old('email') ? old('email') : $setting_app->email }}"
                                                placeholder="" name="email" autocomplete="off">
                                            @error('email')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="address">Address</label>
                                            <textarea rows="5" class="form-control @error('address') is-invalid @enderror" id="address" type="text"
                                                placeholder="" name="address">{{ old('address') ? old('address') : $setting_app->address }}</textarea>
                                            @error('address')
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="token_callbacck">Token</label>
                                            <input class="form-control @error('token_callback') is-invalid @enderror"
                                                id="token_callback" type="text"
                                                value="{{ old('token_callback') ? old('token_callback') : $setting_app->token_callback }}"
                                                placeholder="" name="token_callback" autocomplete="off">
                                            @error('token_callback')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="token_callbacck">Endpoint Purchase Code</label>
                                            <input
                                                class="form-control @error('endpoint_purchase_code') is-invalid @enderror"
                                                id="endpoint_purchase_code" type="text"
                                                value="{{ old('endpoint_purchase_code') ? old('endpoint_purchase_code') : $setting_app->endpoint_purchase_code }}"
                                                placeholder="" name="endpoint_purchase_code" autocomplete="off">
                                            @error('endpoint_purchase_code')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="token_callbacck">Endpoint NMS</label>
                                            <input class="form-control @error('endpoint_nms') is-invalid @enderror"
                                                id="endpoint_nms" type="text"
                                                value="{{ old('endpoint_nms') ? old('endpoint_nms') : $setting_app->endpoint_nms }}"
                                                placeholder="" name="endpoint_nms" autocomplete="off">
                                            @error('endpoint_nms')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="token_callbacck">Notif Tele</label>
                                            <select name="is_notif_tele"
                                                class="form-control  @error('is_notif_tele') is-invalid @enderror"
                                                id="is_notif_tele">
                                                <option value="">-- Pilih --</option>
                                                <option value="1"
                                                    {{ $setting_app->is_notif_tele == '1' ? 'selected' : '' }}>
                                                    Yes</option>
                                                <option value="0"
                                                    {{ $setting_app->is_notif_tele == '0' ? 'selected' : '' }}>
                                                    No</option>
                                            </select>
                                            @error('is_notif_tele')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @can('setting_app_update')
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="mdi mdi-content-save"></i>
                                                Update</button>
                                        @endcan
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endpush

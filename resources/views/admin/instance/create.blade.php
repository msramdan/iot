@extends('layouts.master')
@section('title', 'Create Instance')
@push('style')
<style>
    .map-embed {
		width: 100%;
		height: 400px;
	}

	a.resultnya {
		color: #1e7ad3;
		text-decoration: none;
	}

	a.resultnya:hover { text-decoration: underline }
	.search-box {
		position: relative;
		margin: 0 auto;
		width: 300px;
	}

	.search-box input#search-loc {
		height: 26px;
		width: 100%;
		padding: 0 12px 0 25px;
		background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
		border-width: 1px;
		border-style: solid;
		border-color: #a8acbc #babdcc #c0c3d2;
		border-radius: 13px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		-ms-box-sizing: border-box;
		-o-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
	}

	.search-box input#search-loc:focus {
		outline: none;
		border-color: #66b1ee;
		-webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
	}
	.search-box .results {
		display: none;
		position: absolute;
		top: 35px;
		left: 0;
		right: 0;
		z-index: 9999;
		padding: 0;
		margin: 0;
		border-width: 1px;
		border-style: solid;
		border-color: #cbcfe2 #c8cee7 #c4c7d7;
		border-radius: 3px;
		background-color: #fdfdfd;
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
		background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: linear-gradient(top, #fdfdfd, #eceef4);
		-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		overflow: hidden auto;
		max-height: 34vh;
	}

	.search-box .results li { display: block }

	.search-box .results li:first-child { margin-top: -1px }

	.search-box .results li:first-child:before, .search-box .results li:first-child:after {
		display: block;
		content: '';
		width: 0;
		height: 0;
		position: absolute;
		left: 50%;
		margin-left: -5px;
		border: 5px outset transparent;
	}

	.search-box .results li:first-child:before {
		border-bottom: 5px solid #c4c7d7;
		top: -11px;
	}

	.search-box .results li:first-child:after {
		border-bottom: 5px solid #fdfdfd;
		top: -10px;
	}

	.search-box .results li:first-child:hover:before, .search-box .results li:first-child:hover:after { display: none }

	.search-box .results li:last-child { margin-bottom: -1px }

	.search-box .results a {
		display: block;
		position: relative;
		margin: 0 -1px;
		padding: 6px 40px 6px 10px;
		color: #808394;
		font-weight: 500;
		text-shadow: 0 1px #fff;
		border: 1px solid transparent;
		border-radius: 3px;
	}

	.search-box .results a span { font-weight: 200 }

	.search-box .results a:before {
		content: '';
		width: 18px;
		height: 18px;
		position: absolute;
		top: 50%;
		right: 10px;
		margin-top: -9px;
		background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
	}

	.search-box .results a:hover {
		text-decoration: none;
		color: #fff;
		text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
		border-color: #2380dd #2179d5 #1a60aa;
		background-color: #338cdf;
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
		background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
		background-image: linear-gradient(top, #59aaf4, #338cdf);
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		-o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
	}

	.lt-ie9 .search input#search-loc { line-height: 26px }

</style>
@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Instance</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instance.index') }}">Instance</a></li>
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
                        <form action="{{ route('instance.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title text-bold">Data Informasi Merchant</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gy-3">
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="instance_code">Instance Code</label>
                                                            <input type="text" readonly class="form-control @error('instance_code') is-invalid @enderror" name="instance_code" id="instance_code" placeholder="" value="{{ old('instance_code') ? old('instance_code') : $instance_code}}" autocomplete="off">
                                                            @error('instance_code')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="instance_name">Instance Name</label>
                                                            <input type="text" class="form-control @error('instance_name') is-invalid @enderror" name="instance_name" id="instance_name" placeholder="" value="{{ old('instance_name') }}" autocomplete="off">
                                                            @error('instance_name')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="push_url">Push Url</label>
                                                            <input type="text" class="form-control @error('push_url') is-invalid @enderror" name="push_url" id="push_url" placeholder="" value="{{ old('push_url') }}" autocomplete="off">
                                                            @error('push_url')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="" value="{{ old('username') }}" autocomplete="off">
                                                            @error('username')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="" value="{{ old('phone') }}" autocomplete="off">
                                                            @error('phone')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="email">Email</label>
                                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="" value="{{ old('email') }}" autocomplete="off">
                                                            @error('email')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="bussiness_id">Bussiness</label>
                                                                <select name="bussiness_id" id="bussiness_id"
                                                                    class="form-control @error('bussiness_id') is-invalid @enderror">
                                                                    <option value="">-- Select --</option>
                                                                    @foreach ($bussinesses as $bussiness)
                                                                        <option value="{{ $bussiness->id }}" {{ old('bussiness_id') == $bussiness->id ? 'selected' : '' }}>
                                                                            {{ $bussiness->bussiness_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('bussiness_id')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <label for="password">Password</label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" id="password" placeholder=""
                                                                value="{{ old('password') }}" autocomplete="off">
                                                            <span class="d-none" style="color: red;" id="error-password"></span>
                                                            @error('password')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                            <div class="my-1">
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="generatePassword()">Generate Password</button>
                                                                <button class="btn btn-sm btn-secondary" type="button"
                                                                    onclick="toggleShowPassword()"><i
                                                                        class="mdi mdi-eye"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="provinsi">Provinsi</label>
                                                                <select name="province_id" id="provinsi"
                                                                    class="form-control  @error('province_id') is-invalid @enderror">
                                                                    <option value="">-- Select --</option>
                                                                    @foreach ($provinces as $province)
                                                                        <option value="{{ $province->id }}">
                                                                            {{ $province->provinsi }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('province_id')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="kota">Kab/Kota</label>
                                                                <select name="city_id" id="kota" class="form-control  @error('city_id') is-invalid @enderror">
                                                                    <option value="">-- Select --</option>

                                                                </select>
                                                                @error('city_id')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="kecamatan">Kecamatan</label>
                                                                <select name="district_id" id="kecamatan"
                                                                    class="form-control  @error('district_id') is-invalid @enderror">
                                                                    <option value="">-- Select --</option>
                                                                </select>
                                                                @error('district_id')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="kelurahan">Kelurahan</label>
                                                                <select name="village_id" id="kelurahan"
                                                                    class="form-control  @error('village_id') is-invalid @enderror">
                                                                    <option value="">-- Select --</option>
                                                                </select>
                                                                @error('village_id')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="address1">Address1</label>
                                                                <textarea name="address1" id="address1" rows="3" class="form-control @error('address1') is-invalid @enderror"
                                                                    placeholder="" value="{{ old('address1') }}" autocomplete="off">{{ old('address1') }}</textarea>
                                                                <span class="d-none" style="color: red;" id="error-address1"></span>
                                                                @error('address1')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="address2">Address2</label>
                                                                <textarea name="address2" id="address2" rows="3" class="form-control @error('address2') is-invalid @enderror"
                                                                    placeholder="" value="{{ old('address2') }}" autocomplete="off">{{ old('address2') }}</textarea>
                                                                <span class="d-none" style="color: red;" id="error-address2"></span>
                                                                @error('address2')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="zip_code">Zip Code</label>
                                                                <input type="text"
                                                                    class="form-control @error('zip_code') is-invalid @enderror"
                                                                    name="zip_code" id="zip_code" placeholder=""
                                                                    value="{{ old('zip_code') }}" autocomplete="off">
                                                                <span class="d-none" style="color: red;" id="error-zip_code"></span>
                                                                @error('zip_code')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="latitude">Latitude</label>
                                                                <input type="text"
                                                                    class="form-control @error('latitude') is-invalid @enderror"
                                                                    name="latitude" id="latitude" placeholder=""
                                                                    value="{{ old('latitude') }}" autocomplete="off">
                                                                <span class="d-none" style="color: red;" id="error-latitude"></span>
                                                                @error('latitude')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                         <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="longitude">Longitude</label>
                                                                <input type="text"
                                                                    class="form-control @error('longitude') is-invalid @enderror"
                                                                    name="longitude" id="longitude" placeholder=""
                                                                    value="{{ old('longitude') }}" autocomplete="off">
                                                                <span class="d-none" style="color: red;" id="error-longitude"></span>
                                                                @error('longitude')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="card px-2 py-1">
                                                            <div class="mb-3 search-box">
                                                                <input type="text"
                                                                    class="form-control @error('place') is-invalid @enderror"
                                                                    name="place" id="search_place" placeholder="Cari Lokasi"
                                                                    value="{{ old('place') }}" autocomplete="off">
                                                                <span class="d-none" style="color: red;" id="error-place"></span>
                                                                @error('place')
                                                                    <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                <ul class="results" >
                                                                    <li style="text-align: center;padding: 50% 0; max-height: 25hv;">Masukan Pencarian</li>
                                                                </ul>
                                                            </div>
                                                            <div class="map-embed" id="map"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title text-bold">Data Operational time</h3>
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($days as $i => $day)
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="sunday">Day</label>
                                                            <input type="text"
                                                                class="form-control @error('day.{{$i}}') is-invalid @enderror"
                                                                name="day[]" value="{{ $day }}" placeholder=""
                                                                readonly autocomplete="off">
                                                            @error('day.{{$i}}')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="opening_hour">Opening Hour</label>
                                                            <input type="time" class="form-control @error('opening_hour.{{$i}}') is-invalid @enderror"
                                                                name="opening_hour[]" placeholder=""
                                                                value="{{ old("opening_hour.{$i}") }}" autocomplete="off">
                                                            @error('opening_hour.{{$i}}')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="closing_hour">Closing Hour</label>
                                                            <input type="time" class="form-control @error('closing_hour{{$i}}') is-invalid @enderror"
                                                                name="closing_hour[]" placeholder=""
                                                                value="{{ old("closing_hour.{$i}") }}" autocomplete="off">
                                                            @error('closing_hour{{$i}}')
                                                            <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title text-bold">Data Setting Device Alert Tollerance</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Water Meter -->
                                                    <div class="form-group">
                                                        <h3 class="card-title text-bold">Water Meter</h3>
                                                        <!--Temperature -->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="water_meter">
                                                            <div class="col-md-4">
                                                                <label for="temperatur_tolerance">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="temperature">
                                                                @error('field_data.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.0') }}">
                                                                @error('min_tolerance.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.0') }}">
                                                                @error('max_tolerance.0')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Temperature -->
                                                        <!-- Bateray -->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="water_meter">
                                                            <div class="col-md-4">
                                                                <label for="temperatur_tolerance">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="water_bateray">
                                                                @error('field_data.1')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.1') }}">
                                                                @error('min_tolerance.1')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.1') }}">
                                                                @error('max_tolerance.1')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Bateray -->
                                                    </div>
                                                    <!-- End Water Meter -->
                                                    <!-- Power Meter -->
                                                    <hr>
                                                    <div class="form-group mt-2">
                                                        <h3 class="card-title text-bold">Power Meter</h3>
                                                        <!--Tegangan -->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="power_meter">
                                                            <div class="col-md-4">
                                                                <label for="tegangan">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="tegangan">
                                                                @error('field_data.2')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.2') }}">
                                                                @error('min_tolerance.2')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.2') }}">
                                                                @error('max_tolerance.2')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Tegangan -->
                                                        <!-- Arus -->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="power_meter">
                                                            <div class="col-md-4">
                                                                <label for="arus">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="arus">
                                                                @error('field_data.3')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.3') }}">
                                                                @error('min_tolerance.3')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.3') }}">
                                                                @error('max_tolerance.3')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Arus -->
                                                    </div>
                                                    <!-- End Power Meter -->
                                                    <!-- Gas Meter -->
                                                    <hr>
                                                    <div class="form-group mt-2">
                                                        <h3 class="card-title text-bold">Gas Meter</h3>
                                                        <!--Purchase Remain -->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="gas_meter">
                                                            <div class="col-md-4">
                                                                <label for="tegangan">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="purchase_remain">
                                                                @error('field_data.4')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.4') }}">
                                                                @error('min_tolerance.4')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.4') }}">
                                                                @error('max_tolerance.4')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Purchase remain -->
                                                        <!-- Bateray-->
                                                        <div class="row">
                                                            <input type="hidden" name="type_device[]" value="gas_meter">
                                                            <div class="col-md-4">
                                                                <label for="arus">Field</label>
                                                                <input type="text" class="form-control" name="field_data[]" readonly value="gas_bateray">
                                                                @error('field_data.5')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="min_tolerance">Min Tolerance</label>
                                                                <input type="text" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.5') }}">
                                                                @error('min_tolerance.5')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="max_tolerance">Max Tolerance</label>
                                                                <input type="text" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.5') }}">
                                                                @error('max_tolerance.5')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End Bateray -->
                                                    </div>
                                                    <!-- End Gas Meter -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('instance.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary" ><i class="mdi mdi-content-save"></i> SIMPAN</button>
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
    const options_temp = '<option value="" selected disabled>-- Select --</option>';

    $('#provinsi').change(function() {
        $('#kota, #kecamatan, #kelurahan').html(options_temp);
        if ($(this).val() != "") {
            getKabupatenKota($(this).val());
        }
        // onValidation('provinsi')
    })

    $('#kota').change(function() {
        $('#kecamatan, #kelurahan').html(options_temp);
        if ($(this).val() != "") {
            getKecamatan($(this).val());
        }
       // onValidation('kota')
    })

    $('#kecamatan').change(function() {
        $('#kelurahan').html(options_temp);
        if ($(this).val() != "") {
            getKelurahan($(this).val());
        }
        //onValidation('kecamatan')
    })

    $('#kelurahan').change(function() {
        if ($(this).val() != "") {
            $('#zip_code').val($(this).find(':selected').data('pos'))
        } else {
            $('#zip_code').val('')
        }
        //onValidation('kelurahan')
    });


    function getKabupatenKota(provinsiId) {
        let url = '{{ route('api.kota', ':id') }}';
        url = url.replace(':id', provinsiId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function() {
                $('#kota').prop('disabled', true);
            },
            success: function(res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                });
                $('#kota').html(options_temp + options)
                $('#kota').prop('disabled', false);
            },
            error: function(err) {
                $('#kota').prop('disabled', false);
                alert(JSON.stringify(err))
            }

        })
    }

    function getKecamatan(kotaId) {
        let url = '{{ route('api.kecamatan', ':id') }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function() {
                $('#kecamatan').prop('disabled', true);
            },
            success: function(res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kecamatan}</option>`
                });
                $('#kecamatan').html(options_temp + options);
                $('#kecamatan').prop('disabled', false);
            },
            error: function(err) {
                alert(JSON.stringify(err))
                $('#kecamatan').prop('disabled', false);
            }
        })
    }

    function getKelurahan(kotaId) {
        let url = '{{ route('api.kelurahan', ':id') }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function() {
                $('#kelurahan').prop('disabled', true);
            },
            success: function(res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                });
                $('#kelurahan').html(options_temp + options);
                $('#kelurahan').prop('disabled', false);
            },
            error: function(err) {
                alert(JSON.stringify(err))
                $('#kelurahan').prop('disabled', false);
            }
        })
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
    }

    function toggleShowPassword() {
        const type = $('input#password').attr('type');
        if (type === "password") {
            $('input#password').attr('type', 'text');
        } else {
            $('input#password').attr('type', 'password');
        }
    }
</script>
<script>
	$(document).ready(function() {
		var i = 1;

		function checkKosongLatLong() {
			if($('#latitude').val() == '' || $('#longitude').val() == '') {
				$('.alert-choose-loc').show();
			} else {
				$('.alert-choose-loc').hide();
			}
		}

		var delay = (function () {
			var timer = 0;
			return function (callback, ms) {
				clearTimeout(timer);
				timer = setTimeout(callback, ms);
			};
		})()


		// initialize map
		const getLocationMap = L.map('map');

		// initialize OSM
		const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		const osmAttrib='Leaflet © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
		const osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 50, attribution: osmAttrib});
		// render map

		getLocationMap.scrollWheelZoom.disable()
		getLocationMap.setView(new L.LatLng('-6.8384545', '108.431134'), 14)
		getLocationMap.addLayer(osm)
		// initial hidden marker, and update on click
		const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);

		function getToLoc(lat, lng, displayname = null) {
			const zoom = 17;

			$.ajax({
				url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
				dataType: 'json',
				success: function(data) {
					$('#latitude').val(lat)
					$('#longitude').val(lng)
					if(displayname == null) {
						$('#search_place').val(data.display_name)
					} else {
						$('#search_place').val(displayname)
					}
				}
			});
			getLocationMap.setView(new L.LatLng(lat, lng), zoom);
			getLocationMapMarker.setLatLng([lat, lng])
			$('.results').hide();
			checkKosongLatLong()

		}

		// listen click on map
		getLocationMap.on('click', function(e) {
			// set default lat and lng to 0,0
			const {lat = 0, lng = 0} = e.latlng;
			// update text DOM

			$('#latitude').val(lat)
			$('#longitude').val(lng)
			// update marker position
			getToLoc(lat, lng)
			checkKosongLatLong()

		});



		$(document).on('click', '.resultnya', function() {

			const {lat = 0, lng = 0, dispname = ''} = $(this).data();
			getToLoc(lat,lng, dispname)
		})

		function doSearching(elem) {
			$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Mengetik...</li>');
			const search = elem.val()
			delay(function () {
				if(search.length >= 3) {
					$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;"><i class="fa fa-refresh fa-spin"></i> Mencari...</li>');
					const url = 'https://nominatim.openstreetmap.org/search?format=json&q=' + search;
					$.ajax({
						url: url,
						dataType: 'json',
						success: function(data) {
							$('.results').empty();
							if(data.length > 0) {
								$.each(data, function(i, item) {
									$('.results').append('<li><a class="resultnya" href="#" data-lat="' + item.lat + '" data-lng="' + item.lon + '" data-dispname="' + item.display_name + '">' + item.display_name + '<br/><i class="fa fa-map-marker"></i><span style="margin-left: 7px;">'+ item.lat + ','+ item.lon +'</span></a></li>');
								})
							} else {
								$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Tidak ditemukan (Mungkin ada yang salah dengan ejaan, typo, atau kesalahan ketik)</li>');
							}
						}
					});
				} else {
					$('.results').html('<li style="text-align: center;padding: 50% 0; max-height: 25hv;">Masukan Pencarian (Min. 3 Karakter)</li>');
				}
			}, 1000);
		}

		$('#search_place').focus(function(){
			$('.results').show();
		}).keyup(function() {
			doSearching($(this))
		}).blur(function() {
			setTimeout(function() {
				$('.results').hide();
			}, 1000);
		})
		$('#search_place').on('paste', doSearching($(this)))



	});
</script>
@endpush

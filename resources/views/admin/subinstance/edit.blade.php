@extends('layouts.master')
@section('title', 'Edit Subinstance')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Subinstance</h4>
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
        <form action="{{ route('instance.subinstance.update', [$subinstance->instance_id, $subinstance->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="code_subinstance">Code Subinstance</label>
                                        <input type="text" name="code_subinstance" id="code_subinstance" value="{{ old('code_subinstance') ?? $subinstance->code_subinstance }}"
                                            class="form-control @error('code_subinstance') is-invalid @enderror " readonly>
                                        @error('code_subinstance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="code_subinstance">Name Subinstance</label>
                                        <input type="text" name="name_subinstance" id="name_subinstance" value="{{ old('name_subinstance') ?? $subinstance->name_subinstance }}"
                                            class="form-control @error('name_subinstance') is-invalid @enderror ">
                                        @error('name_subinstance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">Data Setting Device Alert Tolerance</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Water Meter -->
                                    <div class="form-group">
                                        <h3 class="card-title text-bold">Water Meter</h3>
                                        @forelse ($setting_water_tolerances as $s => $water_tolerance)
                                        <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="{{ $water_tolerance->id }}">
                                            <input type="hidden" name="type_device[]" value="{{ $water_tolerance->type_device }}">
                                            <div class="col-md-4">
                                                <label for="temperatur_tolerance">Field</label>
                                                <input type="text" class="form-control" name="field_data[]" readonly value="{{ $water_tolerance->field_data }}">
                                                @error('field_data.{{ $s }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="min_tolerance">Min Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old("min_tolerance.{$s}") ? old("min_tolerance.{$s}") : $water_tolerance->min_tolerance }}">
                                                @error('min_tolerance.{{ $s }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old("max_tolerance.{$s}") ? old("max_tolerance.{$s}") : $water_tolerance->max_tolerance }}">
                                                @error('max_tolerance.{{ $s }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @empty
                                            <!--Temperature -->
                                            <div class="row">
                                                <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                    <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.0') }}">
                                                    @error('min_tolerance.0')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="max_tolerance">Max Tolerance</label>
                                                    <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.0') }}">
                                                    @error('max_tolerance.0')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Temperature -->
                                            <!-- Bateray -->
                                            <div class="row">
                                                <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                    <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.1') }}">
                                                    @error('min_tolerance.1')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="max_tolerance">Max Tolerance</label>
                                                    <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.1') }}">
                                                    @error('max_tolerance.1')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Bateray -->
                                        @endforelse
                                    </div>
                                    <!-- End Water Meter -->
                                    <!-- Power Meter -->
                                    <hr>
                                    <div class="form-group mt-2">
                                        <h3 class="card-title text-bold">Power Meter</h3>
                                        @forelse ($setting_power_tolerances as $p => $power_tolerance)
                                        @php
                                            $p += 2;
                                        @endphp
                                        <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="{{ $power_tolerance->id }}">
                                            <input type="hidden" name="type_device[]" value="{{ $power_tolerance->type_device }}">
                                            <div class="col-md-4">
                                                <label for="temperatur_tolerance">Field</label>
                                                <input type="text" class="form-control" name="field_data[]" readonly value="{{ $power_tolerance->field_data }}">
                                                @error('field_data.{{ $p }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="min_tolerance">Min Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old("min_tolerance.{$p}") ? old("min_tolerance.{$p}") : $power_tolerance->min_tolerance }}">
                                                @error('min_tolerance.{{ $p }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old("max_tolerance.{$p}") ? old("max_tolerance.{$p}") : $power_tolerance->max_tolerance }}">
                                                @error('max_tolerance.{{ $p }}')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @empty
                                         <!--Tegangan -->
                                         <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.2') }}">
                                                @error('min_tolerance.2')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.2') }}">
                                                @error('max_tolerance.2')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- End Tegangan -->
                                        <!-- Arus -->
                                        <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.3') }}">
                                                @error('min_tolerance.3')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.3') }}">
                                                @error('max_tolerance.3')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- End Arus -->
                                        @endforelse
                                    </div>
                                    <!-- End Power Meter -->
                                    <!-- Gas Meter -->
                                    <hr>
                                    <div class="form-group mt-2">
                                        <h3 class="card-title text-bold">Gas Meter</h3>
                                        @forelse ($setting_gas_tolerances as $g => $gas_tolerance)
                                            @php
                                                $g += 4;
                                            @endphp
                                            <div class="row">
                                                <input type="hidden" name="device_tolerance_id[]" value="{{ $gas_tolerance->id }}">
                                                <input type="hidden" name="type_device[]" value="{{ $gas_tolerance->type_device }}">
                                                <div class="col-md-4">
                                                    <label for="temperatur_tolerance">Field</label>
                                                    <input type="text" class="form-control" name="field_data[]" readonly value="{{ $gas_tolerance->field_data }}">
                                                    @error('field_data.{{ $g }}')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="min_tolerance">Min Tolerance</label>
                                                    <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old("min_tolerance.{$g}") ? old("min_tolerance.{$g}") : $gas_tolerance->min_tolerance }}">
                                                    @error('min_tolerance.{{ $g }}')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="max_tolerance">Max Tolerance</label>
                                                    <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old("max_tolerance.{$g}") ? old("max_tolerance.{$g}") : $gas_tolerance->max_tolerance }}">
                                                    @error('max_tolerance.{{ $g }}')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @empty
                                          <!--Purchase Remain -->
                                          <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.4') }}">
                                                @error('min_tolerance.4')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.4') }}">
                                                @error('max_tolerance.4')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- End Purchase remain -->
                                        <!-- Bateray-->
                                        <div class="row">
                                            <input type="hidden" name="device_tolerance_id[]" value="">
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
                                                <input type="number" step="any" class="form-control" name="min_tolerance[]" value="{{ old('min_tolerance.5') }}">
                                                @error('min_tolerance.5')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="max_tolerance">Max Tolerance</label>
                                                <input type="number" step="any" class="form-control" name="max_tolerance[]" value="{{ old('max_tolerance.5') }}">
                                                @error('max_tolerance.5')
                                                <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- End Bateray -->
                                        @endforelse
                                    </div>
                                    <!-- End Gas Meter -->
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
                                    @forelse ($operational_times as $i => $operational)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="operational_id[]" value="{{ $operational->id }}">
                                            <label for="sunday">Day</label>
                                            <input type="text"
                                                class="form-control @error('day.{{$i}}') is-invalid @enderror"
                                                name="day[]" value="{{ old("day.{$i}") ? old("day.{$i}") : $operational->day }}" placeholder=""
                                                readonly autocomplete="off">
                                            @error('day.{{$i}}')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="opening_hour">Opening Hour</label>
                                            <input type="time" class="form-control @error('opening_hour.{{$i}}') is-invalid @enderror"
                                                name="opening_hour[]" placeholder=""
                                                value="{{ old("opening_hour.{$i}") ? old("opening_hour.{$i}") : $operational->open_hour }}" autocomplete="off">
                                            @error('opening_hour.{{$i}}')
                                            <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="closing_hour">Closing Hour</label>
                                            <input type="time" class="form-control @error('closing_hour{{$i}}') is-invalid @enderror"
                                                name="closing_hour[]" placeholder=""
                                                value="{{ old("closing_hour.{$i}") ? old("closing_hour.{$i}") : $operational->closed_hour }}" autocomplete="off">
                                            @error('closing_hour{{$i}}')
                                            <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @empty
                                        @foreach ($days as $i => $day)
                                        <div class="row">
                                            <input type="hidden" name="operational_id[]" value="">
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
                                    @endforelse
                                    <div class="form-group mt-3">
                                        <a href="{{ route('instance.index') }}" class="btn btn-warning"><i
                                                class="mdi mdi-arrow-left-thin"></i> Back</a>
                                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                            SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

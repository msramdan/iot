@extends('layouts.master')
@section('title', 'Create Instance')

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
                                    <div class="mb-3">
                                        <label for="instance_code">Instance Code</label>
                                        <input type="text" class="form-control @error('instance_code') is-invalid @enderror" name="instance_code" id="instance_code" placeholder="" value="{{ old('instance_code') }}" autocomplete="off">
                                        @error('instance_code')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="instance_name">Instance Name</label>
                                        <input type="text" class="form-control @error('instance_name') is-invalid @enderror" name="instance_name" id="instance_name" placeholder="" value="{{ old('instance_name') }}" autocomplete="off">
                                        @error('instance_name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="" value="{{ old('username') }}" autocomplete="off">
                                        @error('username')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="" value="{{ old('phone') }}" autocomplete="off">
                                        @error('phone')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="" value="{{ old('email') }}" autocomplete="off">
                                        @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label for="bussiness">Bussiness</label>
                                            <select name="bussiness_id" id="bussiness"
                                                class="form-control">
                                                <option value="">-- Select --</option>
                                                @foreach ($bussinesses as $bussiness)
                                                    <option value="{{ $bussiness->id }}">
                                                        {{ $bussiness->bussiness_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
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
                                    <div class="" id="map"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div>
                                            <label for="provinsi">Provinsi</label>
                                            <select name="province_id" id="provinsi"
                                                class="form-control">
                                                <option value="">-- Select --</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">
                                                        {{ $province->provinsi }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label for="kota">Kab/Kota</label>
                                            <select name="city_id" id="kota" class="form-control">
                                                <option value="">-- Select --</option>

                                            </select>
                                            @error('kabkot_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label for="kecamatan">Kecamatan</label>
                                            <select name="district_id" id="kecamatan"
                                                class="form-control">
                                                <option value="">-- Select --</option>
                                            </select>
                                            @error('district_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div>
                                            <label for="kelurahan">Kelurahan</label>
                                            <select name="village_id" id="kelurahan"
                                                class="form-control">
                                                <option value="">-- Select --</option>
                                            </select>
                                            @error('village_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
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
                                    <div class="mb-3">
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
                                    <div class="mb-3">
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAfknwL60X9eEIt8HIVeRQpqD5gfdrjSU&callback=initMap&libraries=&v=weekly" defer></script>
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
async function initMap() {
  const position = await new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject);
  });

  const myLocation = {
    lat: position.coords.latitude,
    lng: position.coords.longitude,
  };

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: myLocation,
  });

  const infoWindow = new google.maps.InfoWindow({
    content: `Latitude: ${myLocation.lat}, Longitude: ${myLocation.lng}`,
    position: myLocation,
  }).open(map);
}
</script>
@endpush

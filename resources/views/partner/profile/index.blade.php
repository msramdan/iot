@extends('layouts.master_merchant')
@section('title', 'Dashboard Merchant')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{ asset('frontend/assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                @if ($merchant->pic)
                                <img src="{{ Storage::url('public/frontend/assets/images/users/'. $merchant->pic) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image" id="photo-profile">
                                @else
                                <img src="{{ asset('frontend/assets/images/users/no-profile-photo.jpg') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image" id="photo-profile">
                                @endif
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <form action="{{ route('merchants.update_pic') }}" method="POST" enctype="multipart/form-data" id="form-profile">
                                        @csrf
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input" name="photo" onchange="readUrl(this, '#photo-profile')">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body shadow">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ Auth::guard('merchant')->user()->merchant_name }}</h5>
                            <p class="text-muted mb-0">{{ Auth::guard('merchant')->user()->email }} /
                               @if (Auth::guard('merchant')->user()->is_active == 0)
                               <span class="badge bg-danger">Non Active</span>
                               @elseif (Auth::guard('merchant')->user()->is_active == 1)
                               <span class="badge bg-success">Active</span>
                               @endif
                            </p>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Approval Status</h5>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-sm">
                                <tr>
                                    <th>Approval 1</th>
                                    <td>
                                        @if ($merchant->approved1 == 'need_approved')
                                        <span class="badge bg-warning ml-auto">Pending</span>
                                        @elseif ($merchant->approved1 == 'rejected')
                                        <span class="badge bg-danger ml-auto">Rejected</span>
                                        @elseif ($merchant->approved1 == 'approved')
                                        <span class="badge bg-success ml-auto">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Approval 2</th>
                                    <td>
                                        @if ($merchant->approved2 == 'need_approved')
                                        <span class="badge bg-warning ml-auto">Pending</span>
                                        @elseif ($merchant->approved2 == 'rejected')
                                        <span class="badge bg-danger ml-auto">Rejected</span>
                                        @elseif ($merchant->approved2 == 'approved')
                                        <span class="badge bg-success ml-auto">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Approval Log</h5>
                            </div>
                        </div>
                        <ul class="list-group list-approval-log">
                            @foreach ($approval_logs as $approval_log)
                            <li class="list-group-item">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><b>{{ $approval_log->step == 'approved1' ? 'Approved 1' : 'Approved 2' }}</b></span>
                                        </div>
                                        <div class="col-md-6">
                                            <small>{{ date('d M Y H:i:s', strtotime($approval_log->created_at)) }}</small>
                                            @if ($approval_log->status == 'need_approved')
                                            <span class="badge bg-warning ml-auto">Pending</span>
                                            @elseif ($approval_log->status == 'rejected')
                                            <span class="badge bg-danger ml-auto">Rejected</span>
                                            @elseif ($approval_log->status == 'approved')
                                            <span class="badge bg-success ml-auto">Approved</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--end card-->
                  <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Mdr Log</h5>
                            </div>
                        </div>
                        <ul class="list-group list-approval-log">
                            @foreach ($mdr_logs as $mdr_log)
                            <li class="list-group-item">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span><b>{{ $mdr_log->value_mdr }}%</b></span>
                                        </div>
                                        <div class="col-md-6">
                                            <small>{{ date('d M Y H:i:s', strtotime($mdr_log->created_at)) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Personal Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#document" role="tab">
                                    <i class="far fa-envelope"></i> Document
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#bank" role="tab">
                                    <i class="far fa-envelope"></i> Bank
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="far fa-user"></i> Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                @include('merchant.profile.partial.tab_personal')
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="document" role="tabpanel">
                                @include('merchant.profile.partial.tab_document')
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="bank" role="tabpanel">
                               @include('merchant.profile.partial.tab_bank')
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel">
                               @include('merchant.profile.partial.tab_password')
                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->
@endsection

@push('js')
    <script>
        function readUrl(input, id_show) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id_show).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);

                $('#form-profile').submit();
            }
        }
    </script>
    <script>
        const options_temp ='<option value="" selected disabled>-- Select --</option>';

        $('#provinsi').change(function(){
            $('#kota, #kecamatan, #kelurahan').html(options_temp);
            if($(this).val() != ""){
                getKabupatenKota($(this).val());
            }
        })

        $('#kota').change(function(){
            $('#kecamatan, #kelurahan').html(options_temp);
            if($(this).val() != ""){
                getKecamatan($(this).val());
            }

        })

        $('#kecamatan').change(function(){
            $('#kelurahan').html(options_temp);
            if($(this).val() != ""){
                getKelurahan($(this).val());
            }
        })

        $('#kelurahan').change(function(){
            if($(this).val() != ""){
                $('#zip_code').val($(this).find(':selected').data('pos'))
            }else{
                $('#zip_code').val('')
            }
        });


        function getKabupatenKota (provinsiId){
            let url = '{{ route("api.kota", ":id") }}';
            url = url.replace(':id', provinsiId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function(){
                    $('#kota').prop('disabled', true);
                },
                success: function(res){
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                    });
                    $('#kota').html(options_temp+options)
                    $('#kota').prop('disabled', false);
                },
                error: function(err){
                    $('#kota').prop('disabled', false);
                    alert(JSON.stringify(err))
                }

            })
        }

        function getKecamatan (kotaId){
            let url = '{{ route("api.kecamatan", ":id") }}';
            url = url.replace(':id', kotaId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function(){
                    $('#kecamatan').prop('disabled', true);
                },
                success: function(res){
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kecamatan}</option>`
                    });
                    $('#kecamatan').html(options_temp+options);
                    $('#kecamatan').prop('disabled', false);
                },
                error: function(err){
                    alert(JSON.stringify(err))
                    $('#kecamatan').prop('disabled', false);
                }
            })
        }

        function getKelurahan (kotaId){
            let url = '{{ route("api.kelurahan", ":id") }}';
            url = url.replace(':id', kotaId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function(){
                    $('#kelurahan').prop('disabled', true);
                },
                success: function(res){
                    const options = res.data.map(value => {
                        return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                    });
                    $('#kelurahan').html(options_temp+options);
                    $('#kelurahan').prop('disabled', false);
                },
                error: function(err){
                    alert(JSON.stringify(err))
                    $('#kelurahan').prop('disabled', false);
                }
            })
        }
    </script>
@endpush

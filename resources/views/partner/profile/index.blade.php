@extends('layouts.master_partner')
@section('title', 'Profile Instance')
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

                                <img src="{{ asset('frontend/assets/images/users/no-profile-photo.jpg') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image" id="photo-profile">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <form action="" method="POST" enctype="multipart/form-data" id="form-profile">
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
                            <h5 class="fs-16 mb-1">{{ Auth::guard('instances')->user()->instance_name }}</h5>
                            <p class="text-muted mb-0">{{ Auth::guard('instances')->user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
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
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="far fa-user"></i> Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                @include('partner.profile.partial.tab_personal')
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel">
                               @include('partner.profile.partial.tab_password')
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

@endpush

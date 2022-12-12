@extends('layouts.master_partner')
@section('title', 'Dashboard Partner')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SubInstance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Instance</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-sm-4">
                                    <div class="search-box">
                                        <input type="text" class="form-control" placeholder="Search Sub Intance">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="team-list row grid-view-filter">
                                    @foreach ($subinstance as $data )
                                        <div class="col">
                                        <div class="card team-box">
                                            <div class="team-cover">
                                                <img src="{{ asset('backend/assets/images/small/img-9.jpg') }}" alt="" class="img-fluid">
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="bookmark-icon flex-shrink-0 me-2">
                                                                    <input type="checkbox" id="favourite1" class="bookmark-input bookmark-hide">
                                                                    <label for="favourite1" class="btn-star">
                                                                        <svg width="20" height="20">
                                                                            <use xlink:href="#icon-star"></use>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle shadow flex-shrink-0">
                                                                <img src="{{ asset('backend/assets/images/users/avatar-2.jpg') }}" alt="" class="img-fluid d-block rounded-circle">
                                                            </div>
                                                            <div class="team-content">
                                                                <a data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                                                                    <h5 class="fs-16 mb-1">{{ $data->code_subinstance }}</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">{{ $data->name_subinstance }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-12 border-end border-end-dashed">
                                                                <h5 class="mb-1">225</h5>
                                                                <p class="text-muted mb-0">Cluster</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="{{ route('instances.subinstance.cluster', $data->id) }}" class="btn btn-light view-btn">View Cluster</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                    </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>


                    </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection

@push('js')

@endpush

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Data File Merchant</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('merchants.update_document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto KTP</label>
                                <input type="file" name="identity_card_photo" class="form-control @error('identity_card_photo') is-invalid @enderror" id="basiInput">
                                @error('identity_card_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->identity_card_photo)
                                <a href="{{ Storage::url('public/backend/images/identity_card/'.$merchant->merchant_approve->identity_card_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto Selfie KTP</label>
                                <input type="file" name="selfie_ktp_photo" class="form-control @error('selfie_ktp_photo') is-invalid @enderror" id="basiInput">
                                @error('selfie_ktp_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->selfie_ktp_photo)
                                <a href="{{ Storage::url('public/backend/images/selfie_ktp/'.$merchant->merchant_approve->selfie_ktp_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto NPWP</label>
                                <input type="file" name="npwp_photo" class="form-control  @error('npwp_photo') is-invalid @enderror" id="basiInput">
                                @error('npwp_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->npwp_photo)
                                <a href="{{ Storage::url('public/backend/images/npwp/'.$merchant->merchant_approve->npwp_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto Outlet</label>
                                <input type="file" name="outlet_photo" class="form-control @error('outlet_photo') is-invalid @enderror" id="basiInput">
                                @error('outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->outlet_photo)
                                <a href="{{ Storage::url('public/backend/images/outlet/'.$merchant->merchant_approve->outlet_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto Owner + Outlet</label>
                                <input type="file" name="owner_outlet_photo" class="form-control @error('owner_outlet_photo') is-invalid @enderror" id="basiInput">
                                @error('owner_outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->owner_outlet_photo)
                                <a href="{{ Storage::url('public/backend/images/owner_outlet/'.$merchant->merchant_approve->owner_outlet_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-md-6">
                            <div>
                                <label for="basiInput" class="form-label">Foto Dalam Outlet</label>
                                <input type="file" name="in_outlet_photo" class="form-control @error('in_outlet_photo') is-invalid @enderror" id="basiInput">
                                @error('in_outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                                @if ($merchant->merchant_approve->in_outlet_photo)
                                <a href="{{ Storage::url('public/backend/images/in_outlet/'.$merchant->merchant_approve->in_outlet_photo ) }}" target="_blank">Click to see images</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="submit" class="btn btn-primary">Updates</button>
                        </div>
                    </div>
                    <!--end col-->
                </form>
            </div>
        </div>
    </div>
</div>

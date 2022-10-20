@extends('layouts.auth_merchant')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <div class="ugf-form">
            <form action="kyc-complete.html">
            <div class="input-block">
                <h4>Personal Information</h4>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="inputFname">First Name</label>
                    <input type="text" class="form-control" id="inputFname" placeholder="e.g.  Smith">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="inputLname">Last Name</label>
                    <input type="text" class="form-control" id="inputLname" placeholder="e.g.  Robert">
                    </div>
                </div>
                </div>
                <div class="form-group">
                <label for="state">State/Provience</label>
                <input type="text" id="state" placeholder="State" class="form-control">
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="address1">Address Line 1</label>
                    <input type="text" class="form-control" id="address1" placeholder="e.g. 2707 Par Drive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" id="address2" placeholder="e.g. Los Angeles, CA 90013">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="e.g. New York">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="zip">Post Code</label>
                    <input type="text" class="form-control" id="zip" placeholder="e.g. 0000">
                    </div>
                </div>
                </div>
                <div class="form-group">
                <div class="custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                    <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#">Terms & Conditions</a> and <a href="#">Privacy policy</a></label>
                </div>
                </div>
            </div>
            <button class="btn">Submit Documents &nbsp; <img src="{{ asset('images/check.svg') }}" alt=""></button>
            </form>
            <a href="kyc-2.html" class="back-to-prev"><img src="{{ ('images/arrow-left-grey.png') }}" alt=""> Back to Previous</a>
        </div>
        </div>
        <div class="col-lg-3">
        <div class="uploaded-documents">
            <h4>Your Documents</h4>
            <ul class="documents">
            <li>National_ID_Front.JPG <a href="#"><img src="images/download.png" alt=""></a></li>
            <li>National_ID_Back.JPG <a href="#"><img src="images/download.png" alt=""></a></li>
            <li>National_ID_Selfie.JPG <a href="#"><img src="images/download.png" alt=""></a></li>
            </ul>
        </div>
        </div>
    </div>
</div>
@endsection

<div id="form-merchant-type" class="text-center input-block form-merchant-type active" data-target_active="#form-personal">
    <h4>Select Type Account</h4>
    <div class="row ml-2 mb-2">
        <label class="merchant-type-label">
            <input type="radio" name="merchant_type" value="bussiness" class="card-input-element" />
            <div class="card card-merchant-type px-5 py-5">
                <img class="merchant-type-icons mx-auto my-auto" src="{{ asset('frontend/images/company.png') }}" alt="">
                <h6 class="text-center mt-1">Bussiness</h6>
            </div>
        </label>

        <label class="merchant-type-label">
            <input type="radio" name="merchant_type" value="personal" class="card-input-element" />
            <div class="card card-merchant-type px-5 py-5">
                <img class="merchant-type-icons mx-auto my-auto" src="{{ asset('frontend/images/personal.png') }}" alt="">
                <h6 class="text-center mt-1">Personal</h6>
            </div>
        </label>
    </div>
</div>

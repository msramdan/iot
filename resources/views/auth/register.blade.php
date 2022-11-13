@extends('layouts.auth_merchant')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="ugf-form">
                <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data" id="form-merchant">
                    @csrf
                    @include('auth.partials.form_merchant_type')
                    @include('auth.partials.form_personal')
                    @include('auth.partials.form_document')
                    <button class="btn btn-next" type="button">Next Step &nbsp; &#10140;</button>
                    <button type="button" class="btn btn-submit d-none" id="submit-register">Submit &nbsp; <img src="{{ asset('images/check.svg') }}" alt=""></button>
                </form>
                <button type="button" class="btn-prev back-to-prev d-none"><img src="{{ ('images/arrow-left-grey.png') }}" alt=""> Back to Previous</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        let type = null;

        $('.btn-next').click(function() {
            let next = $('.active').data('target_active')

            type = $('input[name="merchant_type"]:checked').val();

            if (!type) {
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: 'Please Select Account Type',
                    animation: true,
                    timer: 4000,
                    timerProgressBar: true,
                });
            } else {
                if (type == 'bussiness') {
                    $('.merchant-personal').addClass('d-none');
                    $('#merchant-bisnis1').removeClass('d-none');
                    $('#merchant-bisnis2').removeClass('d-none');
                } else if (type == 'personal'){
                    $('#merchant-bisnis1').addClass('d-none')
                    $('#merchant-bisnis2').addClass('d-none')
                }

                $('.active').addClass('d-none none').removeClass('active');
                $(next).removeClass('d-none none').addClass('active block')
                $('.btn-prev').removeClass('d-none none').addClass('block')


                if (next == '#form-personal') {
                    $('#progres-bar').addClass('progress-bar-mid');
                } else if (next == '#form-document') {
                    $('.btn-next').removeClass('block').addClass('d-none none')
                    $('.btn-submit').removeClass('d-none none').addClass('block')
                    $('#progres-bar').removeClass('progress-bar-mid').addClass('progress-bar-full');
                }
            }
        });

        $('.btn-prev').click(function() {
            let back = $('.active').data('target_back');

            $('.active').removeClass('active').addClass('d-none none');
            $(back).addClass('active block').removeClass('d-none none')

            $('.btn-submit').addClass('d-none none').removeClass('block')
            $('.btn-next').removeClass('d-none none').addClass('block')

            if (back == '#form-merchant-type') {
                $('#progres-bar').removeClass('progress-bar-full progress-bar-mid');
            } else if (back == '#form-personal') {
                $('#progres-bar').removeClass('progress-bar-full').addClass('progress-bar-mid');
            }
        })

        function readUrl(input, id_show) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id_show).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
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
    <script>
        $('#submit-register').click(function() {
            event.preventDefault();
            let merchant_type = $('input[name="merchant_type"]:checked').val()
            let merchant_name = $('#merchant_name').val();
            let merchant_email = $('#email').val();
            let phone  = $('#phone').val();
            let provinsi = $('select[name=provinsi_id] option').filter(':selected').val();
            let kota = $('select[name=kabkot_id] option').filter(':selected').val();
            let kecamatan = $('select[name=kecamatan_id] option').filter(':selected').val();
            let kelurahan = $('select[name=kelurahan_id] option').filter(':selected').val();
            let zip_code = $('#zip_code').val();
            let address1 = $('#address1').val();
            let address2 = $('#address2').val();
            let merchant_category = $('select[name=merchant_category_id] option').filter(':selected').val();
            let bussiness = $('select[name=bussiness_id] option').filter(':selected').val();
            let bank = $('select[name=bank_id] option').filter(':selected').val();
            let number_account = $('#number_account').val();
            let account_name = $('#account_name').val();
            let password = $('#password').val();
            let identity_card_photo = $('#identity_card_photo').val();
            let selfie_ktp_photo = $('#selfie_ktp_photo').val();
            let npwp_photo = $('#npwp_photo').val();
            let outlet_photo = $('#outlet_photo').val();
            let owner_outlet_photo = $('#owner_outlet_photo').val();
            let in_outlet_photo = $('#in_outlet_photo').val();
            let certificate_of_domicile = $('#certificate_of_domicile').val();
            let copy_bank_account_book = $('#copy_bank_account_book').val();
            let copy_proof_ownership = $('#copy_proof_ownership').val();
            let siup_photo = $('#siup_photo').val();
            let tdp_photo = $('#tdp_photo').val();
            let copy_corporation_deed = $('#copy_corporation_deed').val();
            let copy_management_deed = $('#copy_management_deed').val();
            let copy_sk_menkeh = $('#copy_sk_menkeh').val();
            let error_message = [];

            if (['undefined', '', null].includes(merchant_name)) {
                error_message.push('merchant_name');
                $('#merchant_name').addClass('is-invalid');
                $('#error-merchant-name').removeClass('d-none').text('Merchant name field is required')
            } else {
                $('#merchant_name').removeClass('is-invalid');
                $('#error-merchant-name').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(merchant_email)) {
               error_message.push('merchant_email');
                $('#email').addClass('is-invalid');
                $('#error-email').removeClass('d-none').text('Email field is required')
            } else {
                if (!validateEmail(merchant_email)) {
                    error_message.push('merchant_email');
                    $('#email').addClass('is-invalid');
                    $('#error-email').removeClass('d-none').text('Email is not valid');
                } else {
                    $('#email').removeClass('is-invalid');
                    $('#error-email').addClass('d-none').text('');
                }
            }

            if (['undefined', '', null].includes(phone)) {
                error_message.push('phone');
                $('#phone').addClass('is-invalid');
                $('#error-phone').removeClass('d-none').text('Phone field is required')
            } else {
                $('#phone').removeClass('is-invalid');
                $('#error-phone').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(provinsi)) {
                error_message.push('provinsi');
                $('#provinsi').addClass('is-invalid');
                $('#error-provinsi').removeClass('d-none').text('Provinsi field is required')
            } else {
                $('#provinsi').removeClass('is-invalid');
                $('#error-provinsi').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(kota)) {
                error_message.push('kota');
                $('#kota').addClass('is-invalid');
                $('#error-kota').removeClass('d-none').text('Kota / Kabupaten field is required')
            } else {
                $('#kota').removeClass('is-invalid');
                $('#error-kota').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(kecamatan)) {
                error_message.push('kecamatan');
                $('#kecamatan').addClass('is-invalid');
                $('#error-kecamatan').removeClass('d-none').text('Kecamatan field is required')
            } else {
                $('#kecamatan').removeClass('is-invalid');
                $('#error-kecamatan').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(kelurahan)) {
                error_message.push('kelurahan');
                $('#kelurahan').addClass('is-invalid');
                $('#error-kelurahan').removeClass('d-none').text('Kelurahan field is required')
            } else {
                $('#kelurahan').removeClass('is-invalid');
                $('#error-kelurahan').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(zip_code)) {
                error_message.push('zip_code');
                $('#zip_code').addClass('is-invalid');
                $('#error-zip_code').removeClass('d-none').text('Zip Code field is required')
            } else {
                $('#zip_code').removeClass('is-invalid');
                $('#error-zip_code').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(address1)) {
                error_message.push('address1');
                $('#address1').addClass('is-invalid');
                $('#error-address1').removeClass('d-none').text('Address1 field is required')
            } else {
                $('#address1').removeClass('is-invalid');
                $('#error-address1').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(address2)) {
                error_message.push('address2');
                $('#address2').addClass('is-invalid');
                $('#error-address2').removeClass('d-none').text('Address2 field is required')
            } else {
                $('#address2').removeClass('is-invalid');
                $('#error-address2').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(merchant_category)) {
                error_message.push('merchant_category');
                $('#merchant_category').addClass('is-invalid');
                $('#error-merchant_category').removeClass('d-none').text('Merchant Category field is required')
            } else {
                $('#merchant_category').removeClass('is-invalid');
                $('#error-merchant_category').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(bussiness)) {
                 error_message.push('bussiness');
                $('#bussiness').addClass('is-invalid');
                $('#error-bussiness').removeClass('d-none').text('Bussiness field is required')
            } else {
                $('#bussiness').removeClass('is-invalid');
                $('#error-bussiness').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(bank)) {
                error_message.push('bank');
                $('#bank').addClass('is-invalid');
                $('#error-bank').removeClass('d-none').text('Bank field is required')
            } else {
                $('#bank').removeClass('is-invalid');
                $('#error-bank').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(number_account)) {
                error_message.push('number_account');
                $('#number_account').addClass('is-invalid');
                $('#error-number-account').removeClass('d-none').text('Number account field is required')
            } else {
                $('#number_account').removeClass('is-invalid');
                $('#error-number-account').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(account_name)) {
                error_message.push('account_name');
                $('#account_name').addClass('is-invalid');
                $('#error-account-name').removeClass('d-none').text('Account Name field is required')
            } else {
                $('#account_name').removeClass('is-invalid');
                $('#error-account-name').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(password)) {
                error_message.push('password');
                $('#password').addClass('is-invalid');
                $('#error-password').removeClass('d-none').text('Password field is required')
            } else {
                $('#password').removeClass('is-invalid');
                $('#error-password').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(identity_card_photo)) {
                error_message.push('identity_card_photo');
                $('#identity_card_photo').addClass('is-invalid');
                $('#error-identity_card_photo').removeClass('d-none').text('Identity Card photo field is required')
            } else {
                $('#identity_card_photo').removeClass('is-invalid');
                $('#error-identity_card_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(selfie_ktp_photo)) {
                error_message.push('selfie_ktp_photo');
                $('#selfie_ktp_photo').addClass('is-invalid');
                $('#error-selfie_ktp_photo').removeClass('d-none').text('Selfie KTP photo field is required')
            } else {
                $('#selfie_ktp_photo').removeClass('is-invalid');
                $('#error-selfie_ktp_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(npwp_photo)) {
                error_message.push('npwp_photo');
                $('#npwp_photo').addClass('is-invalid');
                $('#error-npwp_photo').removeClass('d-none').text('NPWP Photo field is required')
            } else {
                $('#npwp_photo').removeClass('is-invalid');
                $('#error-npwp_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(outlet_photo)) {
                error_message.push('outlet_photo');
                $('#outlet_photo').addClass('is-invalid');
                $('#error-outlet_photo').removeClass('d-none').text('Outlet Photo field is required')
            } else {
                $('#outlet_photo').removeClass('is-invalid');
                $('#error-outlet_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(owner_outlet_photo)) {
                error_message.push('owner_outlet_photo');
                $('#owner_outlet_photo').addClass('is-invalid');
                $('#error-owner_outlet_photo').removeClass('d-none').text('Owner Outlet Photo field is required')
            } else {
                $('#owner_outlet_photo').removeClass('is-invalid');
                $('#error-owner_outlet_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(in_outlet_photo)) {
                error_message.push('in_outlet_photo');
                $('#in_outlet_photo').addClass('is-invalid');
                $('#error-in_outlet_photo').removeClass('d-none').text('In Outlet Photo field is required')
            } else {
                $('#in_outlet_photo').removeClass('is-invalid');
                $('#error-in_outlet_photo').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(certificate_of_domicile)) {
                error_message.push('certificate_of_domicile');
                $('#certificate_of_domicile').addClass('is-invalid');
                $('#error-certificate_of_domicile').removeClass('d-none').text('Certificate of domicile field is required')
            } else {
                $('#certificate_of_domicile').removeClass('is-invalid');
                $('#error-certificate_of_domicile').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(copy_bank_account_book)) {
                error_message.push('copy_bank_account_book');
                $('#copy_bank_account_book').addClass('is-invalid');
                $('#error-copy_bank_account_book').removeClass('d-none').text('Copy Bank Account Book field is required')
            } else {
                $('#copy_bank_account_book').removeClass('is-invalid');
                $('#error-copy_bank_account_book').addClass('d-none').text('');
            }

            if (['undefined', '', null].includes(copy_proof_ownership)) {
                error_message.push('copy_proof_ownership');
                $('#copy_proof_ownership').addClass('is-invalid');
                $('#error-copy_proof_ownership').removeClass('d-none').text('Copy Proof Ownership field is required')
            } else {
                $('#copy_proof_ownership').removeClass('is-invalid');
                $('#error-copy_proof_ownership').addClass('d-none').text('');
            }

            if (merchant_type == 'bussiness') {
                if (['undefined', '', null].includes(siup_photo)) {
                    error_message.push('siup_photo');
                    $('#siup_photo').addClass('is-invalid');
                    $('#error-siup_photo').removeClass('d-none').text('Siup Photo field is required')
                } else {
                    $('#siup_photo').removeClass('is-invalid');
                    $('#error-siup_photo').addClass('d-none').text('');
                }

                if (['undefined', '', null].includes(tdp_photo)) {
                    error_message.push('tdp_photo');
                    $('#tdp_photo').addClass('is-invalid');
                    $('#error-tdp_photo').removeClass('d-none').text('Tdp Photo field is required')
                } else {
                    $('#tdp_photo').removeClass('is-invalid');
                    $('#error-tdp_photo').addClass('d-none').text('');
                }

                if (['undefined', '', null].includes(copy_corporation_deed)) {
                    error_message.push('copy_corporation_deed');
                    $('#copy_corporation_deed').addClass('is-invalid');
                    $('#error-copy_corporation_deed').removeClass('d-none').text('Copy Corporation deed field is required')
                } else {

                    $('#copy_corporation_deed').removeClass('is-invalid');
                    $('#error-copy_corporation_deed').addClass('d-none').text('');
                }

                if (['undefined', '', null].includes(copy_management_deed)) {
                    error_message.push('copy_management_deed');
                    $('#copy_management_deed').addClass('is-invalid');
                    $('#error-copy_management_deed').removeClass('d-none').text('Copy Management deed field is required')
                } else {

                    $('#copy_management_deed').removeClass('is-invalid');
                    $('#error-copy_management_deed').addClass('d-none').text('');
                }

                if (['undefined', '', null].includes(copy_sk_menkeh)) {
                    error_message.push('copy_sk_menkeh');
                    $('#copy_sk_menkeh').addClass('is-invalid');
                    $('#error-copy_sk_menkeh').removeClass('d-none').text('Copy SK Menkeh field is required')
                } else {

                    $('#copy_sk_menkeh').removeClass('is-invalid');
                    $('#error-copy_sk_menkeh').addClass('d-none').text('');
                }

                //console.log(error_message);
                //console.log(error_message.length);
                if (error_message.length <= 0) {
                    $('#form-merchant').submit();
                }
            }
        })

        const validateEmail = (email) => {
        return String(email)
            .toLowerCase()
            .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
    </script>
@endpush

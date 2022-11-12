$('#submit-merchant').click(function () {
    event.preventDefault();
    let nmid = $('#nmid').val();
    let merchant_name = $('#merchant_name').val();
    let merchant_email = $('#merchant_email').val();
    let merchant_category = $('select[name=merchant_category_id] option').filter(':selected').val();
    let merchant_type = $('select[name=merchant_type] option').filter(':selected').val();
    let bussiness = $('select[name=bussiness_id] option').filter(':selected').val();
    let mdr = $('#mdr').val();
    let phone = $('#phone').val();
    let provinsi = $('select[name=provinsi_id] option').filter(':selected').val();
    let kota = $('select[name=kabkot_id] option').filter(':selected').val();
    let kecamatan = $('select[name=kecamatan_id] option').filter(':selected').val();
    let kelurahan = $('select[name=kelurahan_id] option').filter(':selected').val();
    let address1 = $('#address1').val();
    let address2 = $('#address2').val();
    let zip_code = $('#zip_code').val();
    let note = $('#note').val();
    let password = $('#password').val();
    let bank = $('select[name=bank_id] option').filter(':selected').val();
    let number_account = $('#number_account').val();
    let account_name = $('#account_name').val();
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
    let rek_pooling = $('select[name=rek_pooling_id] option').filter(':selected').val();
    let error_message = [];

    if (['undefined', '', null].includes(nmid)) {
        error_message.push('nmid');
        $('#nmid').addClass('is-invalid');
        $('#error-nmid').removeClass('d-none').text('NMID field is required')
    } else {
        $('#nmid').removeClass('is-invalid');
        $('#error-nmid').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(mdr)) {
        error_message.push('mdr');
        $('#mdr').addClass('is-invalid');
        $('#error-mdr').removeClass('d-none').text('MDR field is required')
    } else {
        $('#mdr').removeClass('is-invalid');
        $('#error-mdr').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_name)) {
        error_message.push('merchant_name');
        $('#merchant_name').addClass('is-invalid');
        $('#error-merchant_name').removeClass('d-none').text('Merchant name field is required')
    } else {
        $('#merchant_name').removeClass('is-invalid');
        $('#error-merchant_name').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_type)) {
        error_message.push('merchant_type');
        $('#merchant_type').addClass('is-invalid');
        $('#error-merchant_type').removeClass('d-none').text('Merchant name field is required')
    } else {
        $('#merchant_type').removeClass('is-invalid');
        $('#error-merchant_type').addClass('d-none').text('');
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
        $('#bank_id').addClass('is-invalid');
        $('#error-bank_id').removeClass('d-none').text('Bank field is required')
    } else {
        $('#bank_id').removeClass('is-invalid');
        $('#error-bank_id').addClass('d-none').text('');
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
        $('#error-account_name').removeClass('d-none').text('Account Name field is required')
    } else {
        $('#account_name').removeClass('is-invalid');
        $('#error-account_name').addClass('d-none').text('');
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

    if (['undefined', '', null].includes(rek_pooling)) {
        error_message.push('rek_pooling_id');
        $('#rek_pooling_id').addClass('is-invalid');
        $('#error-rek_pooling_id').removeClass('d-none').text('Copy SK Menkeh field is required')
    } else {

        $('#rek_pooling_id').removeClass('is-invalid');
        $('#error-rek_pooling_id').addClass('d-none').text('');
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

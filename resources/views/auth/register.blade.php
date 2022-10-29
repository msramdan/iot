@extends('layouts.auth_merchant')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="ugf-form">
                <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('auth.partials.form_merchant_type')
                    @include('auth.partials.form_personal')
                    @include('auth.partials.form_document')
                    <button class="btn btn-next" type="button">Next Step &nbsp; &#10140;</button>
                    <button class="btn btn-submit d-none">Submit &nbsp; <img src="{{ asset('images/check.svg') }}" alt=""></button>
                </form>
                <button type="button" class="btn-prev back-to-prev d-none"><img src="{{ ('images/arrow-left-grey.png') }}" alt=""> Back to Previous</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('.btn-next').click(function() {
            let next = $('.active').data('target_active')

            let type = $('input[name="merchant_type"]:checked').val();

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
@endpush

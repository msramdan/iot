<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src=https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset("backend/assets/libs/swiper/swiper-bundle.min.js") }} "></script>
<!-- apexcharts -->
<script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- Dashboard init -->
<script src="{{ asset('backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script type='text/javascript' src='{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}'></script>
<script>
    $('#ubahPassword').click(function() {
        $('#ajaxModelEditPassword').modal('show');
    });
</script>
@stack('js')
@include('sweetalert::alert')


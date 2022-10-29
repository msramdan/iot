<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>

<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('frontend/assets/js/countrySelect.min.js') }}"></script>

<script src="{{ asset('frontend/js/custom.js') }}"></script>
@stack('js')
@include('sweetalert::alert')

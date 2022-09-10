<script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/password-addon.init.js')}}"></script>
<script src=" {{ asset('backend/assets/js/pages/form-validation.init.js') }} "></script>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

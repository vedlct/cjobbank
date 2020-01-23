
<!-- Footer -->
<footer class="footer" style="position: fixed">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © {{date('Y')}} Caritas Job Bank by Techcloud Ltd.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>

<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('public/assets/js/waves.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.scrollTo.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

<script src="{{asset('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('public/assets/js/app.js')}}"></script>
{{--<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/b-1.5.6/datatables.min.js"></script>--}}
<script>
    var ckBaseUrl = "<?php echo url('/');; ?>";
    function remove_account(){
        $.alert({
            title: 'Warning!',
            type: 'warning',
            content: 'Want to remove your account !',
            buttons: {
                tryAgain: {
                    text: 'YES',
                    btnClass: 'btn-red',
                    action: function () {
                        window.location.replace("{{url('remove-account')}}");
                    }
                },
                try: {
                    text: 'No',
                    btnClass: 'btn-blue'
                }
            }
        });
    }
</script>

@yield('foot-js')

</body>


</html>

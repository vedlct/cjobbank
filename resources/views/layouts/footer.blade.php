
<!-- Footer -->
<footer class="footer">
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

<script>
    var ckBaseUrl = "<?php echo url('/');; ?>";
</script>

<script>
//    $(document).bind("contextmenu",function(e) {
//        e.preventDefault();
//    });
//
//    document.onkeydown = function(e) {
//        if(event.keyCode == 123) {
//            return false;
//        }
//        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
//            return false;
//        }
//        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
//            return false;
//        }
//        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
//            return false;
//        }
//    }
</script>

@yield('foot-js')

</body>


</html>

<!-- Footer -->
<footer class="footer" style="position: fixed">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © <?php echo e(date('Y')); ?> Caritas Job Bank by Techcloud Ltd.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="<?php echo e(asset('public/assets/js/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/waves.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.scrollTo.min.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


<script src="<?php echo e(asset('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/assets/js/app.js')); ?>"></script>

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
                        window.location.replace("<?php echo e(url('remove-account')); ?>");
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

<?php echo $__env->yieldContent('foot-js'); ?>

</body>


</html>

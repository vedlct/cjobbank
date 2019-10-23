<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage User</h4>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="userTable" class="table-bordered table-condensed text-center table-hover" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax":{
                    "url": "<?php echo route('admin.getmanageUserData.User'); ?>",
                    "type": "POST",
                    data:function (d){
                        d._token="<?php echo e(csrf_token()); ?>";
                    }
                },
                columns: [
                    { title:'Name', data: 'name', name: 'name', "orderable": false, "searchable":true },
                    { title:'Email', data: 'email', name: 'email', "orderable": false, "searchable":true },
                    { title:'Created', data: 'created_at', name: 'created_at', "orderable": false, "searchable":true },
                    { title:'Action', "data": function(data){
                        var btn="<button class='btn btn-success btn-sm' id='userId' value='"+data.userId+"' onclick='resetUser(this)'>Reset</button>"
                        return btn;
                        },
                        "orderable": false, "searchable":false
                    }
                ]
            });
        });

        function resetUser() {

            $.ajax({
                type: 'POST',
                url: "<?php echo route('admin.changeUserPassword'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': $('#userId').val()},
                success: function (data) {

                    $.alert({
                        title: 'Success',
                        type: 'green',
                        content: 'User Password Changed Successfully',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-green',
                                action: function () {
                                    table.ajax.reload();
                                }
                            }
                        }
                    });
                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
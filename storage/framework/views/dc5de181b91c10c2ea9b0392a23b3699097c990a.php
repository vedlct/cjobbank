<?php $__env->startSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade" id="NewDegisnationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Other Skill</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="<?php echo e(route('manage.otherSkill.insert')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">

                            <label for="">Skill<span style="color: red">*</span></label>

                            <input class="form-control" name="skillName" required type="text">

                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                </div>



            </div>
        </div>
    </div>



    <div class="modal" id="editModalDegisnation">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Skill</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div  id="editModalBodyDegisnation">

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card container">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <div class="card-header-tabs">
                        <h4>Manage Other Skill</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewDegisnation()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                    <div class="table table-responsive">
                        <table id="designationtable" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>


                                <th>Skill</th>
                                <th>Status</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $otherSkill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($d->skillName); ?></td>
                                    <td>
                                        <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($d->status == $key): ?>
                                                <?php echo e($value); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td width="10%"><button class="btn btn-sm btn-success" data-panel-id="<?php echo e($d->id); ?>" onclick="editDegisnation(this)">Edit</button>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>

                        </table>
                    </div>
                    <br>


                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>
    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    
    
    
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>

    <script>
        $(function () {
            $('#designationtable').DataTable({
                "ordering": false,
            });
        });
        function addnewDegisnation() {


            $('#NewDegisnationModal').modal({show:true});

        }
        function editDegisnation(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "<?php echo route('admin.editOtherSkill'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBodyDegisnation').html(data);
                    $('#editModalDegisnation').modal();
                }
            });


        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
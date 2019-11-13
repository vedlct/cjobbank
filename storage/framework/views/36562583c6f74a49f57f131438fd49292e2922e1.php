<?php $__env->startSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade" id="NewEducationDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Education Degree</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="<?php echo e(route('manage.educationDegree.insert')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">

                            <label for="">Education Level<span style="color: red">*</span></label>
                            <select name="educationLevel" class="form-control" required id="educationLevel">
                                <option value="">Select Education Level</option>
                                    <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education->educationLevelId); ?>"><?php echo e($education->educationLevelName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="form-group">

                            <label for="">Degree<span style="color: red">*</span></label>

                            <input class="form-control" name="degree" required type="text">

                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                </div>



            </div>
        </div>
    </div>



    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Degree</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div  id="editModalBody">

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
                        <h4>Manage Education</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewEducation()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Education Level Name</th>
                            <th>Education Degree Name</th>
                            <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                       <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                               <td><?php echo e($d->educationLevelName); ?></td>
                               <td><?php echo e($d->degreeName); ?></td>
                               <td><button class="btn btn-sm btn-success" data-panel-id="<?php echo e($d->degreeId); ?>" onclick="editDegree(this)">Edit</button>
                               </td>

                           </tr>

                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>

                    </table>
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
           $('#managecv').DataTable();
        });
        function addnewEducation() {


            $('#NewEducationDegreeModal').modal({show:true});

        }
        function editDegree(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "<?php echo route('admin.editDegree'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBody').html(data);
                    $('#editModal').modal();
                }
            });


        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade" id="NewEducationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Education Level</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="<?php echo e(route('manage.education.insert')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="">Education Level Name</label>
                            <input type="text" class="form-control" maxlength="128" name="education" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Education Level is Under :</label><br>
                            <label class="radio-inline">
                                <input type="radio" value="1" required name="eduLvlUnder">Board
                            </label>
                            <label class="radio-inline">
                                <input type="radio" required value="2" name="eduLvlUnder">University
                            </label>

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
                    <h4 class="modal-title">Edit Education</h4>
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


                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card-header-tabs">
                        <h4>Manage Education Level</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewEducation()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                        <div class="table table-responsive">
                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Education Level Name</th>
                            <th>Education Level Under</th>
                            <th>Status</th>
                            <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($education->educationLevelName); ?></td>
                                <td><?php if($education->eduLvlUnder == "1"): ?>Board <?php elseif($education->eduLvlUnder == "2"): ?>University <?php endif; ?></td>
                                <td>
                                    <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($education->status == $key): ?>
                                            <?php echo e($value); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><button class="btn btn-sm btn-success" data-panel-id="<?php echo e($education->educationLevelId); ?>" onclick="editEducation(this)">Edit</button>
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

    <script>
        $(function () {
            $('#managecv').DataTable(
                {
                    "ordering": false,

                }
            );
        });
    </script>

    <script>
        function editEducation(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "<?php echo route('admin.editEducation'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBody').html(data);
                    $('#editModal').modal();
                }
            });


        }
        function addnewEducation() {


            $('#NewEducationModal').modal({show:true});

        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
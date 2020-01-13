<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="NewZoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Zone</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?php echo e(route('admin.zone.insert')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label >Zone Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="zone" name="zone">
                        </div>
                        <div class="form-group">
                            <label >Office Address <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Address" name="officeAddress">
                        </div>
                        <div class="form-group">
                            <label >Phone <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Phone" name="zonePhone">
                            <small>If more than one then put it in comma separated form.</small>
                        </div>
                        <div class="form-group">
                            <label >Email <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Email" name="zoneEmail">
                            <small>If more than one then put it in comma separated form.</small>
                        </div>
                        <div class="form-group">
                            <label >Website <span style="color: red">*</span></label>
                            <input type="text" class="form-control" placeholder="Website" name="zoneWeb">
                        </div>
                        <div class="form-group">
                            <label for="">Status <span style="color: red">*</span></label>
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

    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Zone</h4>
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
                        <h4>Manage Zone</h4>
                    </div>

                    <div align="right">
                        <a onclick="addZone()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                    <div class="table table-responsive">
                        <table id="manageZone" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Zone Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Zone status</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($zone->zoneName); ?></td>
                                    <td><?php echo e($zone->officeAddress); ?></td>
                                    <td><?php echo e($zone->zonePhone); ?></td>
                                    <td><?php echo e($zone->zoneEmail); ?></td>
                                    <td><?php echo e($zone->zoneWeb); ?></td>
                                    <td>
                                        <?php $__currentLoopData = STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($zone->status == $key): ?>
                                                <?php echo e($value); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><button class="btn btn-success btn-sm" data-panel-id="<?php echo e($zone->zoneId); ?>" onclick="editZone(this)">Edit</button></td>
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
            $('#manageZone').DataTable(
                {
                    "ordering": false
                }
            );
        });

        function editZone(x) {
            var id=$(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: "<?php echo route('admin.editZone'); ?>",
                cache: false,
                data: {_token: "<?php echo e(csrf_token()); ?>",'id': id},
                success: function (data) {
                    $('#editModalBody').html(data);
                    $('#editModal').modal();
                }
            });
        }
        function addZone() {
            $('#NewZoneModal').modal({show:true});
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
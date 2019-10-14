<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Today's Job Apply</h2>
                    </div>

                    <div class="table table-responsive">
                    <table id="todayJobApply" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Degisnation</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Zone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sl=1;
                                ?>

                        <?php $__currentLoopData = $todaysJobApply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $TodayJobApply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($sl); ?></td>
                            <td><?php echo e($TodayJobApply->firstName." ".$TodayJobApply->lastName); ?></td>
                            <td><?php echo e($TodayJobApply->position); ?></td>
                            <td>
                                <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($TodayJobApply->gender == $value): ?><?php echo e($key); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($TodayJobApply->email); ?></td>
                            <td>
                                <?php $__currentLoopData = $allZone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($TodayJobApply->fkzoneId == $zone->zoneId): ?><?php echo e($zone->zoneName); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>

                        <?php
                            $sl++;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                    </div>
                    <br>

                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
    <?php if(Auth::user()->fkuserTypeId!==USER_TYPE['ZoneAdmin']): ?>

    <div style="margin-top: 30px;" class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Today's Register CV</h2>
                    </div>
                    <div class="table table-responsive">
                    <table id="todayRegisterCV" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Ethnicity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                        ?>

                        <?php $__currentLoopData = $todaysRegisterCv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayCv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($no); ?></td>
                            <td><?php echo e($todayCv->firstName." ".$todayCv->lastName); ?></td>
                            <td><?php echo e($todayCv->email); ?></td>
                            <td><?php echo e($todayCv->personalMobile); ?></td>
                            <td>
                                <?php $__currentLoopData = GENDER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($todayCv->gender == $value): ?><?php echo e($key); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($todayCv->fkreligionId == $reli->religionId): ?><?php echo e($reli->religionName); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $ethnicity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ethen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($todayCv->ethnicityId == $ethen->ethnicityId): ?><?php echo e($ethen->ethnicityName); ?> <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot-js'); ?>

    <script src="<?php echo e(url('public/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            table1=$('#todayJobApply').DataTable(
                {

                    "columnDefs": [
                        {
                            "targets": [0], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ],
                    "ordering": false,

                }
            );
            table2=$('#todayRegisterCV').DataTable(
                {

                    "columnDefs": [
                        {
                            "targets": [0], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ],
                    "ordering": false,

                }
            );
        } );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
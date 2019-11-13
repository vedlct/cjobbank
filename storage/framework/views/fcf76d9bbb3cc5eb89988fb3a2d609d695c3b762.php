<form method="post" action="<?php echo e(route('update.cvProfessionalCertificate')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="professionalQualificationId" value="<?php echo e($professional->professionalQualificationId); ?>">
    <div class="row">
        <div class="form-group col-md-10">
            <label for="inputEmail4">Certificate Name :</label>
            <input type="text" class="form-control" name="certificateName" id="inputEmail4" value="<?php echo e($professional->certificateName); ?>" placeholder="certificate" required>
        </div>
        <div class="form-group col-md-2 ">
            <button type="button" class="btn btn-info btn-sm " onclick="editInfo(<?php echo e($professional->professionalQualificationId); ?>)"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession(<?php echo e($professional->professionalQualificationId); ?>)"><i class="fa fa-trash"></i></button>

        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Institute Name :</label>
            <input type="text" class="form-control" name="institutionName" id="inputEmail4" value="<?php echo e($professional->institutionName); ?>" placeholder="institution" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Result :</label>
            <input type="text" class="form-control" name="result" value="<?php echo e($professional->result); ?>" id="inputPassword4" placeholder="">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Start Date :</label>
            <input type="text" class="form-control date" name="startDate" value="<?php echo e($professional->startDate); ?>" id="start" placeholder="date" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">End Date :</label>
            <input type="text" class="form-control date" name="endDate" value="<?php echo e($professional->endDate); ?>" id="end" placeholder="date">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Staus :</label>
            <select class="form-control" name="status">
            <option value="1" <?php if($professional->status == 1): ?> selected <?php endif; ?>>On going</option>
            <option value="2" <?php if($professional->status == 2): ?> selected <?php endif; ?>>Completed</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <button  class="btn btn-info pull-right">Update</button>
        </div>

    </div>

</form>
<form method="post" action="<?php echo e(route('candidate.ApplyJob',['jobId'=>$jobId])); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="form-group col-md-6">
            <label>Current Salary</label>
            <input type="number" placeholder="current salary" name="currentSalary">
        </div>
        <div class="form-group col-md-6">
            <label>Expected Salary</label>
            <input type="number" placeholder="expected salary" name="expectedSalary" required>
        </div>
        <div class="form-group col-md-6">
            <button class="btn btn-success" type="submit" onclick="btnhide()" id="button-apply">Apply</button>
        </div>
    </div>
</form>

<script>
    function btnhide() {
        $("#button-apply").hide();
    }
</script>

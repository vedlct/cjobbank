<form method="post" action="{{route('candidate.ApplyJob',['jobId'=>$jobId])}}">
    {{csrf_field()}}
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
            <button class="btn btn-success">Apply</button>
        </div>

    </div>
</form>
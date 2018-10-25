<form method="post" action="{{route('manage.major.update',['id'=>$editMajor->educationMajorId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Major</label>
        <input type="text" class="form-control" maxlength="255" value="{{$editMajor->educationMajorName}}" placeholder="major" name="major" required>
    </div>

    <div class="form-group">
        <label for="">Degree<span style="color: red">*</span></label>
        <select name="degree" class="form-control" required id="degree">
            <option value="">Select Degree </option>
            @foreach($degree as $d)
                <option @if($editMajor->fkDegreeId==$d->degreeId)selected @endif value="{{$d->degreeId}}">{{$d->degreeName}}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
            <option value="{{$key}}" {{ $editMajor->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<form method="post" action="{{route('manage.degree.update',['id'=>$degree->degreeId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Education Level</label>
        <select class="form-control" name="educationLevel">
            @foreach($educations as $education)
                <option value="{{$education->educationLevelId}}" {{ $degree->educationLevelId == $education->educationLevelId ? 'selected' : '' }}>{{$education->educationLevelName}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Degree Name</label>
        <input type="text" class="form-control" maxlength="255" value="{{$degree->degreeName}}" placeholder="degree" name="degree" required>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $degree->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
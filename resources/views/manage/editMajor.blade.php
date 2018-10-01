<form method="post" action="{{route('manage.major.update',['id'=>$editMajor->educationMajorId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Major</label>
        <input type="text" class="form-control" value="{{$editMajor->educationMajorName}}" placeholder="major" name="major" required>
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
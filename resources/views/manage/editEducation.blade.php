<form method="post" action="{{route('manage.education.update',['id'=>$education->educationLevelId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Education Name</label>
        <input type="text" class="form-control" value="{{$education->educationLevelName}}" placeholder="education" name="education" required>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $education->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<form method="post" action="{{route('manage.education.update',['id'=>$education->educationLevelId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Education Name</label>
        <input type="text" class="form-control" value="{{$education->educationLevelName}}" placeholder="education" name="education" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<form method="post" action="{{route('manage.religion.update',['id'=>$editReligion->religionId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Religion</label>
        <input type="text" class="form-control" maxlength="25" value="{{$editReligion->religionName}}" placeholder="religionName" name="religionName" required>
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $editReligion->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
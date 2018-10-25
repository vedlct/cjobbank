<form method="post" action="{{route('manage.ethnicity.update',['id'=>$editEthnicity->ethnicityId])}}">
    {{csrf_field()}}


    <div class="form-group">

        <label for="">Ethnicity<span style="color: red">*</span></label>

        <input class="form-control" name="ethnicityName" maxlength="50" value="{{$editEthnicity->ethnicityName}}" required type="text">

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $editEthnicity->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
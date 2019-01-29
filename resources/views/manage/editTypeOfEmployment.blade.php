<form method="post" action="{{route('manage.typeOfEmployment.update',['id'=>$type->id])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Employement type Name<span style="color: red">*</span></label>
        <input type="text" maxlength="45" class="form-control" value="{{$type->employmentTypeName}}"  name="employmentTypeName" required>
    </div>
    {{--<div class="form-group">--}}
    {{--<label for="">Serial &nbsp;</label><label>(last serial number: <span style="color: red">{{$lastserialnumber->serial}}</span>)</label>--}}
    {{--<input type="text" class="form-control" value="{{$editDegisnation->serial}}" placeholder="serial" name="serial" required>--}}
    {{--</div>--}}

    <div class="form-group">
        <label for="">Status<span style="color: red">*</span></label>
        <select class="form-control" required name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $type->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
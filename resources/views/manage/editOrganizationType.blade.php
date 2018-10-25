<form method="post" action="{{route('manage.organizationType.update',['id'=>$organizationType->organizationTypeId])}}">
    {{csrf_field()}}


    <div class="form-group">

        <label for="">OrganizationType<span style="color: red">*</span></label>

        <input class="form-control" name="typeName" maxlength="50" value="{{$organizationType->organizationTypeName}}" required type="text">

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $organizationType->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
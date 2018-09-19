<form method="post" action="{{route('manage.degisnation.update',['id'=>$editDesignation->designationId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Degisnation</label>
        <input type="text" class="form-control" value="{{$editDesignation->designationName}}" placeholder="designation" name="designationName" required>
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="">Serial &nbsp;</label><label>(last serial number: <span style="color: red">{{$lastserialnumber->serial}}</span>)</label>--}}
        {{--<input type="text" class="form-control" value="{{$editDegisnation->serial}}" placeholder="serial" name="serial" required>--}}
    {{--</div>--}}

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
            <option value="{{$key}}" {{ $editDesignation->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
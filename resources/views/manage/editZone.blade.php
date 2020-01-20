<form method="post" action="{{route('admin.zone.update',['id'=>$zone->zoneId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Zone Name <span style="color: red">*</span></label>
        <input type="text" class="form-control" value="{{$zone->zoneName}}" placeholder="zone" name="zone" required>
    </div>
    <div class="form-group">
        <label >Office Address <span style="color: red">*</span></label>
        <input type="text" class="form-control" value="{{$zone->officeAddress}}" name="officeAddress">
    </div>
    <div class="form-group">
        <label >Phone <span style="color: red">*</span></label>
        <input type="text" class="form-control" value="{{$zone->zonePhone}}" name="zonePhone">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Email <span style="color: red">*</span></label>
        <input type="text" class="form-control" value="{{$zone->zoneEmail}}" name="zoneEmail">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Website <span style="color: red">*</span></label>
        <input type="text" class="form-control" value="{{$zone->zoneWeb}}" name="zoneWeb">
    </div>
    <div class="form-group">
        <label for="">Status <span style="color: red">*</span></label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $zone->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

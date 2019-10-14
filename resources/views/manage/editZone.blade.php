<form method="post" action="{{route('admin.zone.update',['id'=>$zone->zoneId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Zone Name</label>
        <input type="text" class="form-control" value="{{$zone->zoneName}}" placeholder="zone" name="zone" required>
    </div>
    <div class="form-group">
        <label >Office Address</label>
        <input type="text" class="form-control" value="{{$zone->officeAddress}}" name="officeAddress">
    </div>
    <div class="form-group">
        <label >Phone</label>
        <input type="text" class="form-control" value="{{$zone->zonePhone}}" name="zonePhone">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control" value="{{$zone->zoneEmail}}" name="zoneEmail">
        <small>If more than one then put it in comma separated form.</small>
    </div>
    <div class="form-group">
        <label >Website</label>
        <input type="text" class="form-control" value="{{$zone->zoneWeb}}" name="zoneWeb">
    </div>
    <div class="form-group">
        <label for="">Status</label>
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

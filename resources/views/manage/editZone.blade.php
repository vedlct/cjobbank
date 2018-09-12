<form method="post" action="{{route('admin.zone.update',['id'=>$zone->zoneId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Zone Name</label>
        <input type="text" class="form-control" value="{{$zone->zoneName}}" placeholder="zone" name="zone" required>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
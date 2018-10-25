<form method="post" action="{{route('admin.skill.update',['id'=>$zone->id])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Skill Name</label>
        <input type="text" class="form-control" value="{{$zone->computerSkillName}}" placeholder="Skill Name" name="zone" required>
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
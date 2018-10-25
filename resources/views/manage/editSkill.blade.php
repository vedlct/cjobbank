<form method="post" action="{{route('manage.otherSkill.update',['id'=>$skill->id])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Skill</label>
        <input type="text" maxlength="255" class="form-control" value="{{$skill->skillName}}" placeholder="skill" name="skillName" required>
    </div>
    {{--<div class="form-group">--}}
    {{--<label for="">Serial &nbsp;</label><label>(last serial number: <span style="color: red">{{$lastserialnumber->serial}}</span>)</label>--}}
    {{--<input type="text" class="form-control" value="{{$editDegisnation->serial}}" placeholder="serial" name="serial" required>--}}
    {{--</div>--}}

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $skill->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
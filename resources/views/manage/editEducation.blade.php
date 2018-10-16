<form method="post" action="{{route('manage.education.update',['id'=>$education->educationLevelId])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Education Name</label>
        <input type="text" maxlength="128" class="form-control" value="{{$education->educationLevelName}}" placeholder="education" name="education" required>
    </div>

    <div class="form-group">
        <label for="">Education Level is Under :</label><br>
        <label class="radio-inline">
            <input type="radio" @if($education->eduLvlUnder == '1') checked @endif value="1" required name="eduLvlUnder">Board
        </label>
        <label class="radio-inline">
            <input type="radio" required value="2" @if($education->eduLvlUnder == '2') checked @endif name="eduLvlUnder">University
        </label>

    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $education->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
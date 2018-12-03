<form method="post" action="{{route('manage.language.update',['id'=>$language->id])}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">languege Name</label>
        <input type="text" class="form-control" value="{{$language->languagename}}" placeholder="language" name="language" required>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $language->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<form method="post" action="{{route('manage.nationality.update',['id'=>$editNationality->nationalityId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Nationality</label>
        <input type="text" class="form-control" value="{{$editNationality->nationalityName}}" placeholder="degree" name="nationality" required>
    </div>
    <div class="form-group">
        <label for="">Country Name</label>
        <input type="text" class="form-control" value="{{$editNationality->countryName}}" placeholder="degree" name="country" required>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $editNationality->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
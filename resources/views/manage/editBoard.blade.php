<form method="post" action="{{route('manage.board.update',['id'=>$editBoard->boardId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Board</label>
        <input type="text" maxlength="50" class="form-control" value="{{$editBoard->boardName}}" placeholder="Board" name="board" required>
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $editBoard->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
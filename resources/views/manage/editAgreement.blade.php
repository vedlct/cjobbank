<form method="post" action="{{route('manage.agreement.update',['id'=>$editAgreement->agreementQusId])}}">
    {{csrf_field()}}

    <div class="form-group">
        <label for="">Agreement Qustions</label>
        <input type="text" maxlength="1000" class="form-control" value="{{$editAgreement->qus}}" placeholder="Qus" name="qus" required>
    </div>
    <div class="form-group">
        <label for="">Serial &nbsp;</label><label>(last serial number: <span style="color: red">{{$lastserialnumber->serial}}</span>)</label>
        <input type="text" class="form-control" value="{{$editAgreement->serial}}" placeholder="serial" name="serial" required>
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            @foreach(STATUS as $key=>$value)
                <option value="{{$key}}" {{ $editAgreement->status == $key ? 'selected' : '' }}>{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
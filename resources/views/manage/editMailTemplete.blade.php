
<form method="post" action="{{route('mailTamplate.update')}}">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$mail->tamplateId}}">
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" id="" value="{{$mail->tamplateName}}" name="tamplateName">
    </div>
    <div class="form-group">
        <label for="">Body</label>
        <textarea class="form-control ckeditor" id="tamplateBody" name="tamplateBody" rows="6" >{!! $mail->tamplateBody !!}</textarea>
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            @foreach(STATUS as $key=>$value)
                <option @if($key== $mail->status) selected @endif value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
{{--<script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>--}}
<script>
    CKEDITOR.replace( 'tamplateBody' );
    // $('tamplateBody').CKEDITOR(); // ADD THIS
</script>





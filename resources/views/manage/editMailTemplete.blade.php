
<form method="post" action="{{route('mailTamplate.update')}}">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$mail->tamplateId}}">
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" id="" value="{{$mail->tamplateName}}" name="tamplateName">
    </div>
    <div class="form-group">
        <label for="">Subject line</label>
        <input type="text" class="form-control" id="" placeholder="subject line" value="{{$mail->subject}}" name="subjectLine">
    </div>
    <div class="form-group">
        <label for="">Test Details</label>
        <textarea class="form-control" id="tamplateBody" name="testDetails" rows="2" >{!! $mail->testDetails !!}</textarea>
    </div>
    <div class="form-group">
        <label for="">Test Date</label>
        <input class="form-control datepicker" id="testDate" name="testDate" value="{!! $mail->testDate !!}">
    </div>
    <div class="form-group">
        <label for="">Test Address</label>
        <textarea class="form-control" id="testAddress" name="testAddress" rows="2" >{!! $mail->testAddress !!}</textarea>
    </div>
    <div class="form-group">
        <label for="">Mail Footer</label>
        <textarea class="form-control ckeditor" id="ckBox" name="tamplateFooterAndSign" rows="6" >{!! $mail->tamplateFooterAndSign !!}</textarea>
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="">Status</label>--}}
        {{--<select class="form-control" name="status">--}}
            {{--<option value="">Select Status</option>--}}
            {{--@foreach(STATUS as $key=>$value)--}}
                {{--<option @if($key== $mail->status) selected @endif value="{{$key}}">{{$value}}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}
    <div class="form-group">

        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
{{--<script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>--}}
<script>
    CKEDITOR.replace( 'tamplateBody' );
    CKEDITOR.replace( 'ckBox' );
    // $('tamplateBody').CKEDITOR(); // ADD THIS
</script>






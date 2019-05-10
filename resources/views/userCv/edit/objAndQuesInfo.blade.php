
<div class="col-md-12">


                    <form method="post" action="{{route('cv.updateQuesObj')}}" onsubmit="return submitForm()">
                        {{csrf_field()}}
                        <input type="hidden" name="empQuesObjId" value="{{$employeeCareerInfo->id}}">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Career objective <span style="color: blue">(Max Limit 2500 character)</span></label>
                                <textarea type="text" name="objective" maxlength="2500"  rows="10" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{$employeeCareerInfo->objective}}</textarea>
                                @if ($errors->has('objective'))

                                    <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Expected salary</label>
                                <input type="text"  onkeypress="return isNumberKey(event)" placeholder="expected salary" value="{{$employeeCareerInfo->expectedSalary}}" name="expectedSalary">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Possible joining date</label>
                                <input type="text" class="date" onkeypress="return isNumberKey(event)" placeholder="Possible Joining Date" value="{{$employeeCareerInfo->readyToJoinAfter}}" name="readyToJoinAfter">
                            </div>


                        </div>

                        <div class="form-group">



                            <div class="row">
                                <div class="form-group">
                                    <label for="">{{CAREER_QUES['Ques0']}}<span style="color: red">*</span></label>
                                    <div class="col-md-10 mb-10">
                                        <input class="form-check-input" type="radio" required  name="freshers" value="1" @if(count($employeeCvQuesObjQuesAns)>0) checked @endif   onclick="checkFreshers()"> Yes&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-check-input" type="radio" required  name="freshers" @if(count($employeeCvQuesObjQuesAns)==0) checked @endif onclick="hideFresher()" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>

                        </div>
                            <div id="compulsoryQuestions">


                            {{--@php--}}
                                {{--$st=1;--}}

                            {{--@endphp--}}



                                {{--@foreach($employeeCvQuesObjQues as $empCvObjQues)--}}

                                {{--@if($employeeCvQuesObjQuesAns->where('fkqusId',$empCvObjQues->id)->first())--}}
                                        {{--<input type="hidden" name="id{{$st}}" value="{{$employeeCvQuesObjQuesAns->where('fkqusId',$empCvObjQues->id)->first()->id}}">--}}

                                {{--@endif--}}



                                    {{--<input type="hidden" name="qesId{{$st}}" value="{{$empCvObjQues->id}}">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>--}}

                                        {{--<textarea type="text" name="CareerQues{{$st}}" maxlength="300"  rows="3" class="form-control {{ $errors->has('CareerQues'.$st) ? ' is-invalid' : '' }}" id="CareerQues{{$st}}" placeholder="">{{ old('CareerQues'.$st) }}@if($employeeCvQuesObjQuesAns->where('fkqusId',$empCvObjQues->id)->first()){{$employeeCvQuesObjQuesAns->where('fkqusId',$empCvObjQues->id)->first()->ans}} @endif</textarea>--}}
                                        {{--@if ($errors->has('CareerQues'.$st))--}}

                                            {{--<span class="">--}}
                                        {{--<strong>{{ $errors->first('CareerQues'.$st) }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}

                                    {{--@php--}}
                                        {{--$st++;--}}
                                    {{--@endphp--}}

                                {{--@endforeach--}}




                            {{--@php--}}
                                {{--$nt=$st;--}}

                            {{--@endphp--}}



                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-6">--}}
                                    {{--<label>Current Salary</label>--}}
                                    {{--<input type="text"  onkeypress="return isNumberKey(event)" placeholder="current salary" value="{{$employeeCareerInfo->currentSalary}}" name="currentSalary">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>



                        <div style="overflow:auto;">
                            <div style="float:right;">

                                {{--<a  class="btn btn-danger pull-left" href="{{route('candidate.cvQuesObj')}}">Cancel</a>&nbsp;&nbsp;--}}
                                <button class="btn-danger pull-left" onclick="{{route('candidate.cvQuesObj')}}">Cancel</button>&nbsp;&nbsp;
                                <button type="submit" id="submitBtn">Save</button>


                            </div>
                        </div>

                    </form>

</div>

<script type="text/javascript">
    $(function () {
        // $('#compulsoryQuestions').hide();
        $('.date').datepicker({
            format: 'yyyy-m-d'
        });

        // if($('#freshers').attr('checked')){
        //     $('#compulsoryQuestions').show();
        // }
        //
        // else {
        //     // $('#compulsoryQuestions').hide();
        // }
        @if(count($employeeCvQuesObjQuesAns)>0)
        checkFreshers();

        @else
        hideFresher();

        @endif


    });

    function submitForm() {
        // objective
        var obj=$('#objective').val();
        // alert(obj.length);
        //
        // return false;
        if(obj.length>2500){

            $.alert({
                title: 'Error',
                type: 'red',
                content: "Objective should not exceed more than 2500 character",
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });
            return false;
        }
        return true;
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function checkFreshers() {

        $('#compulsoryQuestions').html('@php $st=1;@endphp\n' +
            '\n' +
            '\n' +
            '\n' +
            '                                @foreach($employeeCvQuesObjQues as $empCvObjQues)\n' +
            '\n' +
            '                                @if($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first())\n' +
            '                                        <input type="hidden" name="id{{$st}}" value="{{$employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()->id}}">\n' +
            '\n' +
            '                                @endif\n' +
            '\n' +
            '\n' +
            '\n' +
            '                                    <input type="hidden" name="qesId{{$st}}" value="{{$empCvObjQues->id}}">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>\n' +
            '\n' +
            '                                        <textarea type="text" name="CareerQues{{$st}}" maxlength="300" required rows="3" class="form-control" id="CareerQues{{$st}}" placeholder="">{{ old("CareerQues".$st) }}@if($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()){{$employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()->ans}} @endif</textarea>\n' +
            '                                        @if ($errors->has("CareerQues".$st))\n' +
            '\n' +
            '                                            <span class="">\n' +
            '                                        <strong>{{ $errors->first("CareerQues".$st) }}</strong>\n' +
            '                                    </span>\n' +
            '                                        @endif\n' +
            '                                    </div>\n' +
            '\n' +
            '                                    @php $st++;@endphp\n' +
            '\n' +
            '                                @endforeach\n' +
            '                            @php $nt=$st; @endphp\n' +
            '                            <div class="row">\n' +
            '                                <div class="form-group col-md-6">\n' +
            '                                    <label>Current salary</label>\n' +
            '                                    <input type="text"  onkeypress="return isNumberKey(event)" placeholder="current salary" value="{{$employeeCareerInfo->currentSalary}}" name="currentSalary">\n' +
            '                                </div>\n' +
            '                            </div>');



    }

    function hideFresher() {
        $('#compulsoryQuestions').html('');

    }



</script>
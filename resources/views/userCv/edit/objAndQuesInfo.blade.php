
<div class="col-md-12">


                    <form method="post" action="{{route('cv.updateQuesObj')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="empQuesObjId" value="{{$employeeCareerInfo->id}}">

                        <div class="form-group">
                            <label for="">{{CAREER_QUES['Ques0']}}<span style="color: red">*</span></label>

                                <input type="checkbox" id="freshers" name="freshers" @if(!$employeeCvQuesObjQuesAns->isEmpty()) checked @endif onclick="checkFreshers(this)">


                            {{--@if ($errors->has('CareerQues1'))--}}

                            {{--<span class="">--}}
                            {{--<strong>{{ $errors->first('CareerQues1') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        </div>
                        <div id="compulsoryQuestions">

                            <div class="form-group">
                                <label for="">Objective<span style="color: red">*</span></label>
                                <textarea type="text" name="objective" maxlength="300"  rows="2" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{$employeeCareerInfo->objective}}</textarea>
                                @if ($errors->has('objective'))

                                    <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @php
                                $st=1;

                            @endphp


                            @foreach($employeeCvQuesObjQuesAns as $empCvObjQues)
                                <input type="hidden" name="qesId{{$st}}" value="{{$empCvObjQues->fkqusId}}">
                                <input type="hidden" name="id{{$st}}" value="{{$empCvObjQues->id}}">
                                <div class="form-group">
                                    <label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>
                                    <textarea type="text" name="CareerQues{{$st}}" maxlength="300"  rows="3" class="form-control {{ $errors->has('CareerQues'.$st) ? ' is-invalid' : '' }}" id="CareerQues{{$st}}" placeholder="Career Question">{{$empCvObjQues->ans}}</textarea>
                                    @if ($errors->has('CareerQues'.$st))

                                        <span class="">
                                        <strong>{{ $errors->first('CareerQues'.$st) }}</strong>
                                    </span>
                                    @endif
                                </div>

                                @php
                                    $st++;
                                @endphp

                            @endforeach




                            @php
                                $nt=$st;

                            @endphp

                            @foreach($employeeCvQuesObjQues as $empCvObjQues12)
                                @foreach($employeeCvQuesObjQuesAns as $empCvObjQues)
                                    @if($empCvObjQues12->id != $empCvObjQues->fkqusId)
                                <input type="hidden" name="qesId{{$nt}}" value="{{$empCvObjQues12->id}}">
                                <input type="hidden" name="id{{$nt}}" value="{{$empCvObjQues12->id}}">
                                <div class="form-group">
                                    <label for="">Ques-{{$nt}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>
                                    <textarea type="text" name="CareerQues{{$nt}}" maxlength="300"  rows="3" class="form-control {{ $errors->has('CareerQues'.$nt) ? ' is-invalid' : '' }}" id="CareerQues{{$nt}}" placeholder="Career Question">{{$empCvObjQues->ans}}</textarea>
                                    @if ($errors->has('CareerQues'.$nt))

                                        <span class="">
                                        <strong>{{ $errors->first('CareerQues'.$nt) }}</strong>
                                    </span>
                                    @endif
                                </div>

                                @php
                                    $nt++;
                                @endphp
                                    @endif

                            @endforeach
                            @endforeach


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Current Salary</label>
                                    <input type="text"  onkeypress="return isNumberKey(event)" placeholder="current salary" value="{{$employeeCareerInfo->currentSalary}}" name="currentSalary">
                                </div>
                            </div>
                        </div>






                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Expected Salary</label>
                                <input type="text"  onkeypress="return isNumberKey(event)" placeholder="expected salary" value="{{$employeeCareerInfo->expectedSalary}}" name="expectedSalary">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Possible Joining Date</label>
                                <input type="text" class="date" onkeypress="return isNumberKey(event)" placeholder="Possible Joining Date" value="{{$employeeCareerInfo->readyToJoinAfter}}" name="readyToJoinAfter">
                            </div>


                        </div>



                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a class="btn btn-danger pull-left" href="{{route('candidate.cvQuesObj')}}">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" id="submitBtn">Save</button>


                            </div>
                        </div>

                    </form>

</div>

<script type="text/javascript">
    $(function () {
        $('#compulsoryQuestions').hide();
        $('.date').datepicker({
            format: 'yyyy-m-d'
        });

        if($('#freshers').attr('checked')){
            $('#compulsoryQuestions').show();
        }

        else {
            $('#compulsoryQuestions').hide();
        }
    });

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function checkFreshers(x) {
        // $('#compulsoryQuestions').show();
        // if($(x).prop("checked") == true){}
        if($(x).prop("checked")){
            $('#compulsoryQuestions').show();
        }

        else {
            $('#compulsoryQuestions').hide();
        }


    }



</script>
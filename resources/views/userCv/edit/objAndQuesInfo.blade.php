
<div class="col-md-12">


                    <form method="post" action="{{route('cv.updateQuesObj')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="empQuesObjId" value="{{$employeeCareerInfo->id}}">

                            <div class="form-group">
                                <label for="">Objective<span style="color: red">*</span></label>
                                <textarea type="text" name="objective" maxlength="300" required rows="2" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{$employeeCareerInfo->objective}}</textarea>
                                @if ($errors->has('objective'))

                                    <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ques-1: {{CAREER_QUES['Ques1']}}<span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues1" maxlength="300" required rows="3" class="form-control {{ $errors->has('CareerQues1') ? ' is-invalid' : '' }}" id="CareerQues1" placeholder="Career Question">{{$employeeCareerInfo->ques_1}}</textarea>
                                @if ($errors->has('CareerQues1'))

                                    <span class="">
                                        <strong>{{ $errors->first('CareerQues1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ques-2: {{CAREER_QUES['Ques2']}}<span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues2" maxlength="300" required rows="3" class="form-control {{ $errors->has('CareerQues2') ? ' is-invalid' : '' }}" id="CareerQues2" placeholder="Career Question">{{$employeeCareerInfo->ques_2}}</textarea>
                                @if ($errors->has('CareerQues2'))

                                    <span class="">
                                        <strong>{{ $errors->first('CareerQues2') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Current Salary</label>
                                <input type="text"  onkeypress="return isNumberKey(event)" placeholder="current salary" value="{{$employeeCareerInfo->currentSalary}}" name="currentSalary">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Expected Salary</label>
                                <input type="text"  onkeypress="return isNumberKey(event)" placeholder="expected salary" value="{{$employeeCareerInfo->expectedSalary}}" name="expectedSalary">
                            </div>


                        </div>

                        <div class="row">
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
        $('.date').datepicker({
            format: 'yyyy-m-d'
        });
    });

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }



</script>
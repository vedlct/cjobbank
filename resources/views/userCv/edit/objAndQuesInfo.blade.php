
<div class="col-md-12">


                    <form method="post" action="{{route('cv.updateQuesObj')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="empQuesObjId" value="{{$employeeCareerInfo->id}}">

                            <div class="form-group">
                                <label for="">Objective<span style="color: red">*</span></label>
                                <textarea type="text" name="objective" maxlength="200" required rows="2" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{$employeeCareerInfo->objective}}</textarea>
                                @if ($errors->has('objective'))

                                    <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ques-1: {{CAREER_QUES['Ques1']}}<span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues1" maxlength="200" required rows="3" class="form-control {{ $errors->has('CareerQues1') ? ' is-invalid' : '' }}" id="CareerQues1" placeholder="Career Question">{{$employeeCareerInfo->ques_1}}</textarea>
                                @if ($errors->has('CareerQues1'))

                                    <span class="">
                                        <strong>{{ $errors->first('CareerQues1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ques-2: {{CAREER_QUES['Ques2']}}<span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues2" maxlength="200" required rows="3" class="form-control {{ $errors->has('CareerQues2') ? ' is-invalid' : '' }}" id="CareerQues2" placeholder="Career Question">{{$employeeCareerInfo->ques_2}}</textarea>
                                @if ($errors->has('CareerQues2'))

                                    <span class="">
                                        <strong>{{ $errors->first('CareerQues2') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a class="btn btn-danger pull-left" href="{{route('candidate.cvQuesObj')}}">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" id="submitBtn">Save</button>


                            </div>
                        </div>

                    </form>

</div>
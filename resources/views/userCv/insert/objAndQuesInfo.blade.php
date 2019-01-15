@extends('main')

@section('content')

    <div class="row">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form id="regForm" method="post" action="{{route('cv.insertQuesObj')}}">
                        <!-- One "tab" for each step in the form: -->

                        {{csrf_field()}}
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Career Objective and Application Information</h2>

                            <div class="form-group">
                                <label for="">{{CAREER_QUES['Ques0']}}<span style="color: red">*</span></label>
                                <input type="checkbox" name="freshers" onclick="checkFreshers(this)">

                                {{--@if ($errors->has('CareerQues1'))--}}

                                {{--<span class="">--}}
                                {{--<strong>{{ $errors->first('CareerQues1') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>



                            <div id="compulsoryQuestions">

                                <div class="form-group">
                                    <label for="">Objective<span style="color: red">*</span></label>
                                    <textarea type="text" name="objective" maxlength="300"  rows="2" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{ old('objective') }}</textarea>
                                    @if ($errors->has('objective'))

                                        <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                @php
                                $st=1;

                                @endphp


                                @foreach($employeeCvQuesObjQues as $empCvObjQues)
                                    <input type="hidden" name="qesId{{$st}}" value="{{$empCvObjQues->id}}">
                                    <div class="form-group">
                                        <label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>
                                        <textarea type="text" name="CareerQues{{$st}}" maxlength="300"  rows="3" class="form-control {{ $errors->has('CareerQues'.$st) ? ' is-invalid' : '' }}" id="CareerQues{{$st}}" placeholder="Career Question">{{ old('CareerQues'.$st) }}</textarea>
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



                            {{--<div class="form-group">--}}
                                {{--<label for="">Ques-1: {{CAREER_QUES['Ques1']}}<span style="color: red">*</span></label>--}}
                                {{--<textarea type="text" name="CareerQues1" maxlength="300" required rows="3" class="form-control {{ $errors->has('CareerQues1') ? ' is-invalid' : '' }}" id="CareerQues1" placeholder="Career Question">{{ old('CareerQues1') }}</textarea>--}}
                                {{--@if ($errors->has('CareerQues1'))--}}

                                    {{--<span class="">--}}
                                        {{--<strong>{{ $errors->first('CareerQues1') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="">Ques-2: {{CAREER_QUES['Ques2']}}<span style="color: red">*</span></label>--}}
                                {{--<textarea type="text" name="CareerQues2" maxlength="300" required rows="3" class="form-control {{ $errors->has('CareerQues2') ? ' is-invalid' : '' }}" id="CareerQues2" placeholder="Career Question">{{ old('CareerQues2') }}</textarea>--}}
                                {{--@if ($errors->has('CareerQues2'))--}}

                                    {{--<span class="">--}}
                                        {{--<strong>{{ $errors->first('CareerQues2') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Current Salary</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" placeholder="current salary" name="currentSalary">
                                </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Expected Salary</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" placeholder="expected salary" name="expectedSalary">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Possible Joining Date</label>
                                    <input type="text" class="date" onkeypress="return isNumberKey(event)" placeholder="Possible Joining Date" name="readyToJoinAfter">
                                </div>


                            </div>



                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="{{route('candidate.cvPersonalInfo')}}"><button type="button" id="btnPevious">Back</button></a>

                                <button type="submit" id="submitBtn">Save</button>

                                {{--<a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
                            </div>
                        </div>



                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->





@endsection

@section('foot-js')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[(n+1)].className += " active";
        }
    </script>

    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
            $('#compulsoryQuestions').hide();
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
    @endsection